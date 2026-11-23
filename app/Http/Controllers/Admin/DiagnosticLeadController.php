<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Cours;
use App\Models\Lead;
use App\Models\LeadActivity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\StreamedResponse;

class DiagnosticLeadController extends Controller
{
    /**
     * Liste paginée des leads avec filtres avancés.
     */
    public function index(Request $request)
    {
        $query = Lead::with(['session', 'coursRecommande', 'assignee'])
            ->orderBy('created_at', 'desc');

        // Filtre par recherche textuelle (prénom, téléphone, email)
        if ($search = $request->input('search')) {
            $query->where(function ($q) use ($search) {
                    $q->where('prenom', 'like', "%{$search}%")
                      ->orWhere('telephone', 'like', "%{$search}%")
                      ->orWhere('email', 'like', "%{$search}%")
                      ->orWhere('titre_cours_recommande', 'like', "%{$search}%")
                      ->orWhere('texte_recommandation', 'like', "%{$search}%");
            });
        }

        // Filtre par statut
        if ($statut = $request->input('statut')) {
            $query->where('statut', $statut);
        }

        // Filtre par responsable assigné
        if ($assignedTo = $request->input('assigned_to')) {
            $query->where('assigned_to', $assignedTo);
        }

        // Filtre par parcours (via session)
        if ($parcours = $request->input('parcours')) {
            $query->whereHas('session', function ($q) use ($parcours) {
                $q->where('parcours_choisi', $parcours);
            });
        }

        // Filtre par date
        if ($dateDebut = $request->input('date_debut')) {
            $query->whereDate('created_at', '>=', $dateDebut);
        }
        if ($dateFin = $request->input('date_fin')) {
            $query->whereDate('created_at', '<=', $dateFin);
        }

        // Statistiques rapides
        $counts = [
            'total' => Lead::count(),
            'nouveau' => Lead::where('statut', 'nouveau')->count(),
            'contacte' => Lead::where('statut', 'contacte')->count(),
            'en_discussion' => Lead::where('statut', 'en_discussion')->count(),
            'converti' => Lead::where('statut', 'converti')->count(),
            'perdu' => Lead::where('statut', 'perdu')->count(),
        ];

        $leads = $query->paginate(20)->withQueryString();
        $admins = Admin::all();

        return view('admin.leads.index', compact('leads', 'counts', 'admins'));
    }

    /**
     * Fiche détaillée du prospect avec toutes les réponses et l'historique d'activités.
     */
    public function show($id)
    {
        $lead = Lead::with(['session.answers.question', 'coursRecommande', 'assignee', 'activities.admin'])
            ->findOrFail($id);

        $admins = Admin::all();
        $allCourses = Cours::select('id', 'titre', 'prix')->orderBy('titre')->get();

        return view('admin.leads.show', compact('lead', 'admins', 'allCourses'));
    }

    /**
     * Mise à jour du statut avec journalisation.
     */
    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'statut' => 'required|in:nouveau,contacte,en_discussion,converti,perdu',
        ]);

        $lead = Lead::findOrFail($id);
        $oldStatus = $lead->statut;
        $newStatus = $request->input('statut');

        if ($oldStatus !== $newStatus) {
            $lead->statut = $newStatus;
            $lead->save();

            $admin = Auth::guard('admin')->user();
            LeadActivity::create([
                'lead_id' => $lead->id,
                'admin_id' => $admin?->id,
                'auteur_nom' => $admin?->name ?? 'Admin',
                'type_action' => 'changement_statut',
                'details' => "Statut modifié de '{$oldStatus}' à '{$newStatus}'.",
            ]);
        }

        return redirect()->back()->with('success', 'Statut mis à jour avec succès.');
    }

    /**
     * Ajout d'une note interne.
     */
    public function addNote(Request $request, $id)
    {
        $request->validate([
            'note' => 'required|string|max:1000',
        ]);

        $lead = Lead::findOrFail($id);
        $admin = Auth::guard('admin')->user();

        LeadActivity::create([
            'lead_id' => $lead->id,
            'admin_id' => $admin?->id,
            'auteur_nom' => $admin?->name ?? 'Admin',
            'type_action' => 'note',
            'details' => $request->input('note'),
        ]);

        return redirect()->back()->with('success', 'Note ajoutée au dossier.');
    }

    /**
     * Assignation d'un lead à un administrateur.
     */
    public function assign(Request $request, $id)
    {
        $request->validate([
            'assigned_to' => 'nullable|exists:admins,id',
        ]);

        $lead = Lead::findOrFail($id);
        $lead->assigned_to = $request->input('assigned_to');
        $lead->save();

        $admin = Auth::guard('admin')->user();
        $assigneeName = $lead->assignee?->name ?? 'Personne';

        LeadActivity::create([
            'lead_id' => $lead->id,
            'admin_id' => $admin?->id,
            'auteur_nom' => $admin?->name ?? 'Admin',
            'type_action' => 'assignation',
            'details' => "Lead assigné à {$assigneeName}.",
        ]);

        return redirect()->back()->with('success', "Lead assigné à {$assigneeName}.");
    }

    /**
     * Recommandation manuelle d'un autre cours de la table `cours`.
     */
    public function changeCourse(Request $request, $id)
    {
        $request->validate([
            'cours_id' => 'required|exists:cours,id',
        ]);

        $lead = Lead::findOrFail($id);
        $newCourse = Cours::findOrFail($request->input('cours_id'));

        $lead->cours_recommande_id = $newCourse->id;
        $lead->titre_cours_recommande = $newCourse->titre;
        $lead->aucune_correspondance = false;
        // Le choix de l'admin prime désormais sur la page recommandée automatiquement.
        $lead->recommandation_manuelle = true;
        $lead->save();

        $admin = Auth::guard('admin')->user();
        LeadActivity::create([
            'lead_id' => $lead->id,
            'admin_id' => $admin?->id,
            'auteur_nom' => $admin?->name ?? 'Admin',
            'type_action' => 'recommandation_manuelle',
            'details' => "Nouveau cours recommandé manuellement : {$newCourse->titre}.",
        ]);

        return redirect()->back()->with('success', 'Cours recommandé mis à jour.');
    }

    /**
     * Export CSV des leads filtrés.
     */
    public function exportCsv(Request $request): StreamedResponse
    {
        $query = Lead::with(['session', 'coursRecommande', 'assignee'])
            ->orderBy('created_at', 'desc');

        if ($statut = $request->input('statut')) {
            $query->where('statut', $statut);
        }
        if ($parcours = $request->input('parcours')) {
            $query->whereHas('session', fn($q) => $q->where('parcours_choisi', $parcours));
        }

        $leads = $query->get();

        $headers = [
            'Content-Type' => 'text/csv; charset=utf-8',
            'Content-Disposition' => 'attachment; filename="leads_diagnostic_' . date('Y-m-d_His') . '.csv"',
        ];

        return response()->stream(function () use ($leads) {
            $handle = fopen('php://output', 'w');
            fputs($handle, "\xEF\xBB\xBF"); // BOM UTF-8 pour Excel

            fputcsv($handle, [
                'ID',
                'Date',
                'Prénom',
                'Téléphone',
                'Email',
                'Canal préféré',
                'Créneau rappel',
                'Parcours',
                'Cours recommandé',
                'Statut',
                'Responsable',
                'Source UTM',
                'Appareil',
            ], ';');

            foreach ($leads as $l) {
                fputcsv($handle, [
                    $l->id,
                    $l->created_at->format('d/m/Y H:i'),
                    $l->prenom,
                    $l->telephone,
                    $l->email ?? '',
                    strtoupper($l->moyen_contact_prefere),
                    $l->creneau_rappel ?? '',
                    $l->session?->parcours_choisi ?? '',
                    $l->titre_recommandation ?? '',
                    $l->status_label,
                    $l->assignee?->name ?? 'Non assigné',
                    $l->session?->utm_source ?? '',
                    $l->session?->appareil ?? '',
                ], ';');
            }

            fclose($handle);
        }, 200, $headers);
    }
}
