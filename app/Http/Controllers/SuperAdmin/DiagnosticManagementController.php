<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Cours;
use App\Models\CoursDiagnosticSetting;
use App\Models\CoursDiagnosticTag;
use App\Models\DiagnosticAnswer;
use App\Models\DiagnosticConfig;
use App\Models\DiagnosticSession;
use App\Models\Formation;
use App\Models\FormationParcoursMapping;
use App\Models\Lead;
use App\Models\LeadActivity;
use App\Models\Question;
use App\Models\QuestionOption;
use App\Models\RecommendationRule;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DiagnosticManagementController extends Controller
{
    /**
     * Tableau de bord analytique et entonnoir de conversion.
     */
    public function analytics(Request $request)
    {
        // 1. Entonnoir de conversion
        $totalSessions = DiagnosticSession::count();
        $finishedSessions = DiagnosticSession::where('statut', 'termine')->count();
        $totalLeads = Lead::count();
        $convertedLeads = Lead::where('statut', 'converti')->count();

        $tauxCompletion = $totalSessions > 0 ? round(($finishedSessions / $totalSessions) * 100, 1) : 0;
        $tauxCapture = $finishedSessions > 0 ? round(($totalLeads / $finishedSessions) * 100, 1) : 0;
        $tauxConversion = $totalLeads > 0 ? round(($convertedLeads / $totalLeads) * 100, 1) : 0;

        // 2. Répartition par parcours
        $parcoursStats = DiagnosticSession::select('parcours_choisi', DB::raw('count(*) as count'))
            ->groupBy('parcours_choisi')
            ->pluck('count', 'parcours_choisi')
            ->toArray();

        // 3. Taux d'abandon par question
        $dropoffQuestions = DiagnosticSession::where('statut', 'en_cours')
            ->whereNotNull('derniere_question_atteinte')
            ->select('derniere_question_atteinte', DB::raw('count(*) as count'))
            ->groupBy('derniere_question_atteinte')
            ->orderByDesc('count')
            ->take(10)
            ->get();

        // 4. Top cours recommandés
        $topCourses = Lead::whereNotNull('titre_cours_recommande')
            ->select('titre_cours_recommande', 'cours_recommande_id', DB::raw('count(*) as total_recommandations'), DB::raw("SUM(CASE WHEN statut = 'converti' THEN 1 ELSE 0 END) as conversions"))
            ->groupBy('titre_cours_recommande', 'cours_recommande_id')
            ->orderByDesc('total_recommandations')
            ->take(8)
            ->get();

        // 5. Besoins sans correspondance (cours manquants)
        $unmatchedLeads = Lead::where('aucune_correspondance', true)
            ->orderByDesc('created_at')
            ->take(10)
            ->get();

        // 6. Sources UTM
        $sourcesUtm = DiagnosticSession::whereNotNull('utm_source')
            ->select('utm_source', DB::raw('count(*) as sessions_count'))
            ->groupBy('utm_source')
            ->orderByDesc('sessions_count')
            ->take(6)
            ->get();

        // 7. Performance des admins
        $adminPerf = Admin::withCount([
            'assignedLeads as total_assigned',
            'assignedLeads as total_converted' => function ($q) {
                $q->where('statut', 'converti');
            }
        ])->get();

        return view('superadmin.diagnostic.analytics', compact(
            'totalSessions',
            'finishedSessions',
            'totalLeads',
            'convertedLeads',
            'tauxCompletion',
            'tauxCapture',
            'tauxConversion',
            'parcoursStats',
            'dropoffQuestions',
            'topCourses',
            'unmatchedLeads',
            'sourcesUtm',
            'adminPerf'
        ));
    }

    /**
     * Gestion No-code du questionnaire (Questions & Options).
     */
    public function questions(Request $request)
    {
        $parcoursFilter = $request->input('parcours', 'all');
        $query = Question::with('options')->orderBy('parcours')->orderBy('ordre');

        if ($parcoursFilter !== 'all') {
            $query->where('parcours', $parcoursFilter);
        }

        $questions = $query->get();

        return view('superadmin.diagnostic.questions', compact('questions', 'parcoursFilter'));
    }

    public function storeQuestion(Request $request)
    {
        $validated = $request->validate([
            'parcours' => 'required|string',
            'code_identifiant' => 'required|string|unique:questions,code_identifiant',
            'titre' => 'required|string',
            'description' => 'nullable|string',
            'type_champ' => 'required|in:single_choice,multiple_choice,dynamic_domain,text',
            'ordre' => 'integer',
        ]);

        $question = Question::create($validated);

        return redirect()->back()->with('success', 'Question créée avec succès.');
    }

    public function updateQuestion(Request $request, $id)
    {
        $question = Question::findOrFail($id);
        $question->update($request->only(['titre', 'description', 'est_actif', 'ordre', 'est_obligatoire']));

        return redirect()->back()->with('success', 'Question mise à jour.');
    }

    public function storeOption(Request $request, $questionId)
    {
        $request->validate([
            'label' => 'required|string',
            'valeur' => 'required|string',
            'tag_type' => 'nullable|string',
            'tag_valeur' => 'nullable|string',
            'ordre' => 'integer',
        ]);

        QuestionOption::create([
            'question_id' => $questionId,
            'label' => $request->input('label'),
            'valeur' => $request->input('valeur'),
            'tag_type' => $request->input('tag_type'),
            'tag_valeur' => $request->input('tag_valeur') ?: $request->input('valeur'),
            'icone' => $request->input('icone', 'fas fa-check'),
            'ordre' => $request->input('ordre', 0),
        ]);

        return redirect()->back()->with('success', 'Option ajoutée.');
    }

    public function deleteOption($id)
    {
        QuestionOption::findOrFail($id)->delete();
        return redirect()->back()->with('success', 'Option supprimée.');
    }

    /**
     * Gestion de la correspondance diagnostic <-> cours (Tags, Activation, Priorité).
     */
    public function courses(Request $request)
    {
        $query = Cours::with(['diagnosticSetting', 'diagnosticTags', 'formation', 'sousFormation'])
            ->orderBy('id', 'asc');

        if ($search = $request->input('search')) {
            $query->where('titre', 'like', "%{$search}%");
        }

        if ($request->input('filter_active') === '1') {
            $query->whereHas('diagnosticSetting', fn($q) => $q->where('actif_diagnostic', true));
        } elseif ($request->input('filter_active') === '0') {
            $query->where(function ($q) {
                $q->whereDoesntHave('diagnosticSetting')
                  ->orWhereHas('diagnosticSetting', fn($sub) => $sub->where('actif_diagnostic', false));
            });
        }

        if ($request->input('filter_without_tags') === '1') {
            $query->whereDoesntHave('diagnosticTags');
        }

        $courses = $query->paginate(25)->withQueryString();
        $formations = Formation::orderBy('titre')->get();
        $rules = RecommendationRule::all();
        $mappings = FormationParcoursMapping::with('formation')->get();

        return view('superadmin.diagnostic.courses', compact('courses', 'formations', 'rules', 'mappings'));
    }

    /**
     * Active ou désactive un cours pour le diagnostic.
     */
    public function toggleCourseActive(Request $request, $id)
    {
        $cours = Cours::findOrFail($id);
        $setting = CoursDiagnosticSetting::firstOrCreate(['cours_id' => $cours->id]);

        $setting->actif_diagnostic = !$setting->actif_diagnostic;
        $setting->save();

        return response()->json([
            'success' => true,
            'actif_diagnostic' => $setting->actif_diagnostic,
        ]);
    }

    /**
     * Met à jour les tags, priorité et message personnalisé d'un cours.
     */
    public function updateCourseDetails(Request $request, $id)
    {
        $cours = Cours::findOrFail($id);
        $setting = CoursDiagnosticSetting::firstOrCreate(['cours_id' => $cours->id]);

        $setting->priorite = (int)$request->input('priorite', 0);
        $setting->message_recommandation = $request->input('message_recommandation');
        if ($request->has('actif_diagnostic')) {
            $setting->actif_diagnostic = (bool)$request->input('actif_diagnostic');
        }
        $setting->save();

        // Ajout d'un tag manuel
        if ($newTagType = $request->input('new_tag_type')) {
            if ($newTagValue = $request->input('new_tag_value')) {
                CoursDiagnosticTag::firstOrCreate([
                    'cours_id' => $cours->id,
                    'type_tag' => $newTagType,
                    'valeur' => trim($newTagValue),
                ], [
                    'est_suggere' => false,
                    'est_valide' => true,
                ]);
            }
        }

        return redirect()->back()->with('success', 'Paramètres du cours mis à jour.');
    }

    /**
     * Valide tous les tags suggérés pour un cours.
     */
    public function validateSuggestedTags($courseId)
    {
        CoursDiagnosticTag::where('cours_id', $courseId)->update(['est_valide' => true]);
        return redirect()->back()->with('success', 'Tags suggérés validés.');
    }

    public function deleteTag($id)
    {
        CoursDiagnosticTag::findOrFail($id)->delete();
        return redirect()->back()->with('success', 'Tag supprimé.');
    }

    /**
     * Mise à jour des règles de recommandation et pondérations.
     */
    public function updateRecommendationRules(Request $request)
    {
        $poids = $request->input('poids', []);
        foreach ($poids as $id => $val) {
            RecommendationRule::where('id', $id)->update(['poids' => (int)$val]);
        }

        return redirect()->back()->with('success', 'Pondérations du moteur mises à jour.');
    }

    /**
     * Mise à jour du mapping Formation -> Parcours.
     */
    public function updateFormationMapping(Request $request)
    {
        $mappings = $request->input('mapping', []);
        foreach ($mappings as $formationId => $parcours) {
            FormationParcoursMapping::updateOrCreate(
                ['formation_id' => $formationId, 'sous_formation_id' => null],
                ['parcours' => $parcours]
            );
        }

        return redirect()->back()->with('success', 'Mapping formations / parcours sauvegardé.');
    }

    /**
     * Configuration globale du module.
     */
    public function settings()
    {
        $configs = DiagnosticConfig::all()->keyBy('cle');
        return view('superadmin.diagnostic.settings', compact('configs'));
    }

    public function updateSettings(Request $request)
    {
        $fields = [
            'titre_accroche' => 'string',
            'delai_reaffichage_jours' => 'integer',
            'whatsapp_contact_number' => 'string',
            'whatsapp_default_message' => 'string',
            'indicatif_pays_defaut' => 'string',
            'module_actif' => 'boolean',
            'emails_notification' => 'string',
            'score_minimum_recommandation' => 'integer',
        ];

        foreach ($fields as $key => $type) {
            $val = $request->input($key);
            if ($type === 'boolean') {
                $val = $request->has($key) ? '1' : '0';
            }
            DiagnosticConfig::set($key, $val, $type);
        }

        return redirect()->back()->with('success', 'Paramètres sauvegardés avec succès.');
    }

    /**
     * Droit à l'effacement RGPD (Suppression lead & sessions).
     */
    public function deleteLeadData($id)
    {
        $lead = Lead::findOrFail($id);
        $sessionId = $lead->session_id;

        $lead->delete();

        if ($sessionId) {
            DiagnosticSession::where('id', $sessionId)->delete();
        }

        return redirect()->route('admin.leads.index')->with('success', 'Données du prospect supprimées définitivement (RGPD).');
    }
}
