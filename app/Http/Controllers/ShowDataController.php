<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Formation;
use App\Models\SousFormation;
use App\Models\Cours;
use App\Models\Reponse;
use App\Models\Comm;
use App\Models\Contact;
use Illuminate\Support\Facades\Hash;
use App\Models\Order;

use Illuminate\Support\Facades\Auth;

use Illuminate\Pagination\LengthAwarePaginator;
class ShowDataController extends Controller
{
    public function index(Request $request)
    {
        // Récupérer toutes les formations avec leurs sous-formations et cours associés
        $formations = Formation::with('sousFormations.cours')->get();

         // Récupérer la formation sélectionnée s'il y a une sélection
         $selectedFormation = null;
         if ($request->has('formation')) {
             $selectedFormation = Formation::with('sousFormations.cours')->find($request->input('formation'));
         }


        // Retourner la vue avec les données
        return view('/liste', [
            'formations' => $formations,
            'selectedFormation' => $selectedFormation
        ]);

    }

    public function editFormation(Request $request, $id)
{
    $formation = Formation::findOrFail($id);
    $formation->titre = $request->input('titre'); // Remplacez 'titre' par le nom du champ que vous voulez mettre à jour
    // Ajoutez d'autres champs à mettre à jour de la même manière
    $formation->save();

    return redirect()->route('particuliers.liste')->with('success', 'Formation mise à jour avec succès.');
}

public function terminerContact($id)
{
    // Récupérer la commande par son ID
    $contact = Contact::findOrFail($id);

    // Mettre à jour l'état en "terminée"
    $contact->etat = 'terminée';
    $contact->save();

    // Redirection avec un message de succès
    return redirect()->back()->with('success', 'La commande a été marquée comme terminée.');
}

public function annulerTerminerContact($id)
{
    // Récupérer la commande par son ID
    $contact = Contact::findOrFail($id);

    // Réinitialiser l'état à "en cours" ou un autre statut par défaut
    $contact->etat = 'en cours';
    $contact->save();

    // Redirection avec un message de succès
    return redirect()->back()->with('success', 'Le statut de la commande a été annulé.');
}


public function deleteFormation(Request $request, $id)
{
    $formation = Formation::findOrFail($id);
    $formation->delete();

    return redirect()->route('particuliers.liste')->with('success', 'Formation supprimée avec succès.');
}

public function ajouterCommentaireOrder(Request $request, $id)
{
    // Trouve la commande par son ID
    $order = Order::findOrFail($id);

    // Met à jour le commentaire de la commande
    $order->commentaire = $request->commentaire;  // Récupère le commentaire depuis le formulaire
    $order->save();  // Sauvegarde la commande avec le commentaire mis à jour

    // Retourne à la page des commandes avec un message de succès
    // Rediriger vers la liste des commandes (index)
  return redirect()->route('particuliers.orders.sho', $order->id)
                 ->with('success', 'Commentaire ajouté avec succès!');

}

public function ajouterCommentaire(Request $request, $id)
{
    // Valider le commentaire
    $request->validate([
        'commentaire' => 'nullable|string|max:255',
    ]);

    // Trouver le contact
    $contact = Contact::findOrFail($id);

    // Mettre à jour le commentaire
    $contact->commentaire = $request->commentaire;
    $contact->save();

    // Rediriger vers la page des demandes avec un message de succès
    return redirect()->route('particuliers.voircontact.consulter')->with('success', 'Commentaire ajouté avec succès.');
}
public function editSousFormation(Request $request, $id)
{
    $sousFormation = SousFormation::findOrFail($id);
    $sousFormation->titre = $request->input('titre'); // Remplacez 'titre' par le nom du champ que vous voulez mettre à jour
    // Ajoutez d'autres champs à mettre à jour de la même manière
    $sousFormation->save();

    return redirect()->route('particuliers.liste')->with('success', 'Sous-formation mise à jour avec succès.');
}

  public function commenter(Request $request, $id)
{
    $reponse = Reponse::findOrFail($id);

    // Mettre à jour le commentaire
    $reponse->commentaire = $request->commentaire;
    $reponse->save();

    return redirect()->route('particuliers.voirsoutien')->with('success', 'Commentaire ajouté avec succès.');
}
public function deleteSousFormation(Request $request, $id)
{
    $sousFormation = SousFormation::findOrFail($id);
    $sousFormation->delete();

    return redirect()->route('particuliers.liste')->with('success', 'Sous-formation supprimée avec succès.');
}


public function editCours(Request $request, $id)
{
    $cours = Cours::findOrFail($id);
    $cours->titre = $request->input('titre'); // Remplacez 'titre' par le nom du champ que vous voulez mettre à jour
    // Ajoutez d'autres champs à mettre à jour de la même manière
    $cours->save();

    return redirect()->route('particuliers.liste')->with('success', 'Cours mis à jour avec succès.');
}


public function deleteCours(Request $request, $id)
{
    $cours = Cours::findOrFail($id);
    $cours->delete();

    return redirect()->route('particuliers.liste')->with('success', 'Cours supprimé avec succès.');
}


public function welcome(Request $request)
{

        // Récupérer toutes les formations avec leurs sous-formations et cours associés
    $formations = Formation::with('sousFormations.cours')->get();

    // Organiser les formations par groupes alphabétiques
    $groupedFormations = [
        'A-D' => [],
        'E-L' => [],
        'M-T' => [],
        'U-Z' => []  // Ajoutez ce groupe si vous avez des formations qui commencent par U-Z
    ];

    foreach ($formations as $formation) {
        $firstLetter = strtoupper($formation->titre[0]);
        if ($firstLetter >= 'A' && $firstLetter <= 'D') {
            $groupedFormations['A-D'][] = $formation;
        } elseif ($firstLetter >= 'E' && $firstLetter <= 'L') {
            $groupedFormations['E-L'][] = $formation;
        } elseif ($firstLetter >= 'M' && $firstLetter <= 'T') {
            $groupedFormations['M-T'][] = $formation;
        } else {
            $groupedFormations['U-Z'][] = $formation;
        }
    }

    // Récupérer la formation sélectionnée s'il y a une sélection
    $selectedFormation = null;
    if ($request->has('formation')) {
        $selectedFormation = Formation::with('sousFormations.cours')->find($request->input('formation'));
    }

    // Retourner la vue avec les données
    return view('welcome', [
        'groupedFormations' => $groupedFormations,
        'selectedFormation' => $selectedFormation
    ]);
    }


public function terminale()
{


    return view('terminale');
}
public function superieur()
{


    return view('/superieur');
}
public function bouge()
{


    return view('/bouge');
}

public function codage()
{


    return view('/codage');
}
public function mini()
{


    return view('/minimetier');
}
public function cabine()
{


    return view('/cabine');
}
public function petit34()
{


    return view('/petit-3-4-ans');
}

public function petit56()
{


    return view('/petit-5-6-ans');
}

public function petit78()
{


    return view('/petit-7-8-ans');
}

public function petit910()
{


    return view('/petit-9-10-ans');
}

public function petit1118()
{


    return view('/petit-11-18-ans');
}
public function petit()
{


    return view('/petit');
}

public function reussir()
{


    return view('/reussir');
}
public function coaching()
{


    return view('/coaching');
}
public function musique()
{


    return view('/musique');
}
public function sportif()
{


    return view('/sportif');
}
public function contact()
{


    return view('/contact');
}
public function primaire()
{
    return view('/primaire');
}
public function dys()
{
    return view('/dys');
}
public function accompagnement()
{
    return view('/accompagnement');
}
public function methode()
{
    return view('/methode');
}
public function sportenf()
{
    return view('/sportenf');
}
public function soutienCollege()
{
    return view('/soutien-collège');
}
public function soutienBrevet()
{
    return view('/soutien-brevet');
}
public function collegeMethode()
{
    return view('/college-methode');
}
public function lyceesous()
{
    return view('/lycee-sous');
}
public function lyceepreparation()
{
    return view('/lycee-preparation');
}
public function lyceecoaching()
{
    return view('/lycee-coaching');
}
public function collegecompe()
{
    return view('/college-competence');
}
public function collegeDigital()
{
    return view('/college-digital');
}
public function seconde()
{
    return view('/seconde');
}

public function premiere()
{
    return view('/premiere');
}
public function orientationSuperieur()
{
    return view('/orientation-superieur');
}
public function soutienSuperieur()
{
    return view('/soutien-superieur');
}
public function methodeSuperieur()
{
    return view('/methode-superieur');
}
public function sportAdulte()
{
    return view('/sport-adulte');
}
public function formation(Request $request)
{
    // Récupérer toutes les formations depuis la base de données
    $formations = Formation::all();

    // Récupérer l'ID de la formation et de la sous-formation sélectionnée (s'il y en a une)
    $selectedFormationId = $request->input('formation_id');
    $selectedSousFormationId = $request->input('sous_formation_id');

    // Initialiser les variables
    $selectedFormation = null;
    $selectedSousFormation = null;
    $sousFormations = collect();
    $cours = collect();

    // Si une formation est sélectionnée, récupérer ses sous-formations et cours associés
    if ($selectedFormationId) {
        $selectedFormation = Formation::with('sousFormations.cours')->find($selectedFormationId);

        // Si la formation sélectionnée est trouvée
        if ($selectedFormation) {
            $sousFormations = $selectedFormation->sousFormations;

            // Si une sous-formation est sélectionnée, récupérer ses cours associés
            if ($selectedSousFormationId) {
                $selectedSousFormation = SousFormation::with('cours')->find($selectedSousFormationId);
                if ($selectedSousFormation) {
                    $cours = $selectedSousFormation->cours;
                }
            } else {
                // Récupérer tous les cours associés aux sous-formations
                foreach ($sousFormations as $sousFormation) {
                    $cours = $cours->merge($sousFormation->cours);
                }
            }
        }
    } else {
        // Récupérer tous les cours de manière aléatoire si aucune formation n'est sélectionnée
        $cours = Cours::inRandomOrder()->get();
    }

    // Retourner la vue avec les données
    return view('formation', [
        'formations' => $formations,
        'selectedFormation' => $selectedFormation,
        'selectedSousFormation' => $selectedSousFormation,
        'sousFormations' => $sousFormations,
        'cours' => $cours,
    ]);
}


   public function formations(Request $request)
{
    // Groupe de thématiques sélectionné (transversale | metier)
    $groupe = $request->input('groupe');

    // Récupérer toutes les formations depuis la base de données
    // (sous-formations chargées pour calculer le nombre de cours par formation)
    $allFormations = Formation::with('sousFormations:id,formation_id')->get();

    // Nombre de thématiques par groupe (pour les cartes)
    $countTransversale = $allFormations->filter(fn ($f) => $f->inCategory('transversale'))->count();
    $countMetier = $allFormations->filter(fn ($f) => $f->inCategory('metier'))->count();

    $formations = $allFormations;

    // Filtrer selon le groupe de thématiques choisi
    if (in_array($groupe, ['transversale', 'metier'])) {
        $formations = $formations->filter(function ($formation) use ($groupe) {
            return $formation->inCategory($groupe);
        })->values();
    }

    // Récupérer l'ID de la formation et sous-formation sélectionnées (s'il y en a)
    $selectedFormationId = $request->input('formation_id');
    $selectedSousFormationId = $request->input('sous_formation_id');

    // Initialiser les variables
    $selectedFormation = null;
    $selectedSousFormation = null;
    $sousFormations = collect();

    // Si une sous-formation est sélectionnée
    if ($selectedSousFormationId) {
        $selectedSousFormation = SousFormation::find($selectedSousFormationId);
    } elseif ($selectedFormationId) {
        // Si une formation est sélectionnée
        $selectedFormation = Formation::with('sousFormations')->find($selectedFormationId);
        if ($selectedFormation) {
            $sousFormations = $selectedFormation->sousFormations;
        }
    }

    // Organiser les formations par groupes alphabétiques
    $groupedFormations = [
        'A-D' => [],
        'E-L' => [],
        'M-T' => [],
        'U-Z' => []
    ];

    foreach ($formations as $formation) {
        $firstLetter = strtoupper($formation->titre[0]);
        if ($firstLetter >= 'A' && $firstLetter <= 'D') {
            $groupedFormations['A-D'][] = $formation;
        } elseif ($firstLetter >= 'E' && $firstLetter <= 'L') {
            $groupedFormations['E-L'][] = $formation;
        } elseif ($firstLetter >= 'M' && $firstLetter <= 'T') {
            $groupedFormations['M-T'][] = $formation;
        } else {
            $groupedFormations['U-Z'][] = $formation;
        }
    }

    // Retourner la vue avec les données
    return view('formations', [
        'groupedFormations' => $groupedFormations,
        'formations' => $formations,
        'allFormations' => $allFormations,
        'countTransversale' => $countTransversale,
        'countMetier' => $countMetier,
        'groupe' => $groupe,
        'selectedFormation' => $selectedFormation,
        'selectedSousFormation' => $selectedSousFormation,
        'sousFormations' => $sousFormations,
        'selectedSousFormationId' => $selectedSousFormationId
    ]);
}
public function cours(Request $request, $id)
{
    // Trouver un seul cours par ID ou échouer
    $cours = Cours::findOrFail($id);

    // Retourner la vue avec l'objet $cours
    return view('cours', compact('cours'));
}

public function updateFormation(Request $request, $id)
{
    $formation = Formation::findOrFail($id);
    $formation->titre = $request->input('titre', $formation->titre);

    // Gérer le groupe de thématiques (case à cocher -> chaîne)
    $formation->categorie = $request->has('categorie')
        ? implode(',', (array) $request->input('categorie'))
        : ($formation->categorie ?: 'transversale');

    $formation->save();
    return redirect()->route('particuliers.liste')->with('success', 'Formation mise à jour avec succès.');
}

 public function update(Request $request, $id)
    {
        $sousFormation = SousFormation::findOrFail($id);
        $sousFormation->update($request->all());
        return redirect()->route('particuliers.liste')->with('success', 'Sous-formation mise à jour avec succès.');
    }

    public function store(Request $request)
{
    try {
        // Valider les données du formulaire
        $validatedData = $request->validate([
            'niveau_scolaire' => 'required|string|max:255',
            'cours' => 'required|string|max:255',
            'choix' => 'required|string|max:255',
            'motif' => 'required|string|max:255',
            'jour' => 'required',
            'field_0' => 'required|string|max:255',
            'field_1' => 'required|string|max:255',
            'field_2' => 'required|email|max:255',
            'field_3' => 'required|string|max:255',
        ]);

        // Créer une nouvelle instance de modèle Reponse avec les données validées
        $reponse = new Reponse([
            'niveau_scolaire' => $validatedData['niveau_scolaire'],
            'cours' => $validatedData['cours'],
            'choix' => $validatedData['choix'],
            'motif' => $validatedData['motif'],
            'jour' => $validatedData['jour'],
            'nom' => $validatedData['field_0'],
            'prenom' => $validatedData['field_1'],
            'email' => $validatedData['field_2'],
            'telephone' => $validatedData['field_3'],
            'commentaire' => 'nullable|string',  // S'assurer que commentaire est nullable
        ]);

        // Sauvegarder la nouvelle instance de modèle dans la base de données
        $reponse->save();

        // Retourner une réponse JSON en cas de succès
        return response()->json(['success' => true, 'status' => 200]);

    } catch (\Illuminate\Validation\ValidationException $e) {
        // Gérer les erreurs de validation
        return response()->json(['errors' => $e->errors(), 'status' => 422], 422);
    } catch (\Illuminate\Database\QueryException $e) {
        // Erreur liée à la base de données
        return response()->json([
            'error' => 'Erreur de base de données',
            'message' => $e->getMessage(),
            'status' => 500
        ], 500);
    } catch (\PDOException $e) {
        // Erreur spécifique de PDO (connexion DB par exemple)
        return response()->json([
            'error' => 'Erreur de connexion à la base de données',
            'message' => $e->getMessage(),
            'status' => 500
        ], 500);
    } catch (\Exception $e) {
        // Gestion d'autres erreurs génériques
        return response()->json([
            'error' => 'Une erreur interne s\'est produite.',
            'message' => $e->getMessage(),
            'status' => 500
        ], 500);
    }
}
 public function terminer($id)
{
    $reponse = Reponse::findOrFail($id);
    $reponse->statut = true;
    $reponse->save();

    return redirect()->back()->with('success', 'Statut mis à jour !');
}
public function annulerTerminer($id)
{
    $reponse = Reponse::findOrFail($id);
    $reponse->statut = false; // Annuler le statut terminé
    $reponse->save();

    return redirect()->back()->with('success', 'Statut terminé supprimé.');
}

public function terminerOrder($id)
{
    $order = Order::findOrFail($id);
    $order->etat = 'vendue'; // Changé de 'terminée' à 'vendue'
    $order->save();

    return redirect()->back()->with('success', 'La commande a été marquée comme vendue.');
}

public function annulerTerminerOrder($id)
{
    $order = Order::findOrFail($id);
    $order->etat = 'annulee'; // Changé de 'en cours' à 'annulee'
    $order->save();

    return redirect()->back()->with('success', 'La commande a été annulée.');
}

    public function repo()
    {
        return view('reponse');
    }
public function voir()
{
    // 1. Commandes en attente
    $commandesNonTerminees = Reponse::where('statut', 0)
        ->orderBy('created_at', 'desc')
        ->get();

    // 2. Commandes terminées → on les force en « vendu »
    $commandesTerminees = Reponse::where('statut', 1)
        ->update(['etat' => 'vendu']); // <-- passe tout en vendu

    $commandesTerminees = Reponse::where('statut', 1)
        ->orderBy('created_at', 'desc')
        ->get();

    // 3. Compteurs
    $countNonTerminees = $commandesNonTerminees->count();
    $countVendus = $commandesTerminees->count(); // toutes les terminées
    $countAnnules = Reponse::where('statut', 1)->where('etat', 'annule')->count();

    return view('voirsoutien', compact(
        'commandesNonTerminees',
        'commandesTerminees',
        'countNonTerminees',
        'countVendus',
        'countAnnules'
    ));
}

public function marquerVendu($id)
{
    $rep = Reponse::findOrFail($id);
    $rep->statut = 1;   // confirmée
    $rep->etat   = 'vendu'; // devient vendue
    $rep->save();
    return back()->with('success', 'Commande passée en « Vendue ».');
}

public function marquerAnnule($id)
{
    $reponse = Reponse::findOrFail($id);
    $reponse->etat = 'annule';
    $reponse->save();
    return back()->with('success', 'Commande annulée.');
}

public function supprimer($id)
{
    $reponse = Reponse::findOrFail($id);
    $reponse->delete();
    return back()->with('success', 'Commande supprimée.');
}

public function terminere($id)
{
    $reponse = Reponse::findOrFail($id);
    $reponse->statut = 1;
    $reponse->save();
    return back()->with('success', 'Commande confirmée.');
}


    public function successResponse()
    {
        return view('success');
    }
  public function showCourses($sousFormationId)
{
    // Récupérer la sous-formation avec ses cours associés
    $sousFormation = SousFormation::findOrFail($sousFormationId);

    // Charger les cours avec les éventuelles commandes (orders)
    $cours = $sousFormation->cours()->with('orders')->get();

    // Récupérer la formation parente de la sous-formation
    $formation = $sousFormation->formation;

    // Récupérer toutes les sous-formations de la formation parente
    $sousFormations = $formation->sousFormations;
$orders = Order::with('cours.sousFormation.formation')
        ->orderBy('created_at', 'desc')
        ->get();
    // Retourner la vue avec toutes les données
    return view('formation', [
        'cours' => $cours,
        'selectedFormation' => $formation,
        'sousFormation' => $sousFormation,
        'sousFormations' => $sousFormations,
    ]);
}



public function showSousFormations(Request $request, $formationId)
{
    // Récupérer la formation avec ses sous-formations
    $formation = Formation::with('sousFormations')->findOrFail($formationId);

    // Récupérer les IDs des sous-formations sélectionnées (tableau)
    $sousFormationIds = $request->input('sousFormation', []);

    // S’assurer que c’est bien un tableau même s’il n’y a qu’un seul élément sélectionné
    if (!is_array($sousFormationIds)) {
        $sousFormationIds = [$sousFormationIds];
    }

    // Récupérer les cours filtrés selon les sous-formations cochées
    if (!empty($sousFormationIds)) {
        $cours = Cours::where('formation_id', $formationId)
            ->whereIn('sous_formation_id', $sousFormationIds)
            ->paginate(20);
    } else {
        // Si aucune sous-formation sélectionnée, récupérer tous les cours
        $cours = Cours::where('formation_id', $formationId)->paginate(20);
    }

    return view('sous_formations', [
        'formation' => $formation,
        'sousFormations' => $formation->sousFormations,
        'sousFormationIds' => $sousFormationIds, // tableau d’IDs sélectionnés pour la vue
        'cours' => $cours,
    ]);
}





public function sousFormationCours($sousFormationId)
{
    // Récupérer la sous-formation avec ses cours associés
    $sousFormation = SousFormation::with('cours')->findOrFail($sousFormationId);

    // Retourner la vue avec les données des cours de la sous-formation
    return view('sous_formation_cours', [
        'sousFormation' => $sousFormation,
    ]);
}


public function showOrderForm($id)
{
    $cours = Cours::findOrFail($id);
    return view('order_form', compact('cours'));
}

public function storeOrder(Request $request)
{
    // Validation des données
    $request->validate([
        'nom' => 'required|string|max:255',
        'email' => 'required|email|max:255',
        'numero' => 'required|string|max:20',
        'commune' => 'required|string|max:255',
        'cours' => 'required|string|max:255',
        'mode_de_formation' => 'required|string|max:255',
        'prix' => 'nullable|string|max:255', // Ajouté
        'duree' => 'required|string|max:255', // Ajouté// Ajoutez cette ligne
    ]);

    // Insertion des données dans la base de données
    $order = Order::create([
        'nom' => $request->input('nom'),
        'email' => $request->input('email'),
        'numero' => $request->input('numero'),
        'commune' => $request->input('commune'),
        'cours' => $request->input('cours'),
        'mode_de_formation' => $request->input('mode_de_formation'),
        'prix' => $request->input('prix'),
        'duree' => $request->input('duree'),
    ]);

    try {
        $mailable = new \App\Mail\CommandeAdminNotification('Commande', [
            'ID' => $order->id,
            'Nom' => $order->nom,
            'Email' => $order->email,
            'Téléphone' => $order->numero,
            'Commune' => $order->commune,
            'Cours' => $order->cours,
            'Mode' => $order->mode_de_formation,
            'Prix' => $order->prix,
            'Durée' => $order->duree,
            'Date' => $order->created_at->format('d/m/Y H:i'),
        ]);

        \Illuminate\Support\Facades\Mail::to([
            env('NOTIFICATION_EMAIL_FORMATION', 'formation@monprofchezmoi-ci.com'),
            env('NOTIFICATION_EMAIL_INSCRIPTION', 'inscription@monprofchezmoi-ci.com'),
        ])->send($mailable);
    } catch (\Exception $e) {
        \Illuminate\Support\Facades\Log::error('Erreur envoi email commande: ' . $e->getMessage());
    }

    // Redirection vers la page de confirmation
    return view('order-confirmation');
}

public function confirmation()
{
    return view('order-confirmation');
}
public function showvoircours()
{
    $commandesNonTerminees = Order::where('etat', 'en cours')->get();
    $commandesVendues = Order::where('etat', 'vendue')->get();
    $commandesAnnulees = Order::where('etat', 'annulee')->get();

    $countNonTerminees = $commandesNonTerminees->count();
    $countVendues = $commandesVendues->count();
    $countAnnulees = $commandesAnnulees->count();

    // Fusionner toutes les commandes
    $all = collect($commandesNonTerminees)
           ->merge($commandesVendues)
           ->merge($commandesAnnulees)
           ->sortByDesc('created_at');

    return view('orders.index', [
        'commandesNonTerminees' => $commandesNonTerminees,
        'commandesTerminees' => $commandesVendues, // Renommé pour la vue
        'commandesAnnulees' => $commandesAnnulees, // Ajouté
        'countNonTerminees' => $countNonTerminees,
        'countTerminees' => $countVendues, // Pour compatibilité avec la vue
        'countAnnulees' => $countAnnulees,
        'all' => $all
    ]);
}

// Dans OrderController.php
public function vendre($id)
{
    $order = Order::findOrFail($id);
    $order->etat = 'vendu';
    $order->save();

    return redirect()->back()->with('success', 'Commande marquée comme vendue');
}

public function annuler($id)
{
    $order = Order::findOrFail($id);
    $order->etat = 'annule';
    $order->save();

    return redirect()->back()->with('success', 'Commande annulée');
}



    // Méthode pour afficher les détails d'une commande spécifique
    public function show($id)
    {
        $order = Order::with(['coursRelation.sousFormation.formation'])->findOrFail($id);

        return view('orders.show', compact('order'));
    }

public function consulter(Request $request)
{
    // valeur par défaut = exactement ce qui est utilisé dans la vue
    $filter = $request->get('filter', 'en cours');

    $query = Contact::orderBy('created_at', 'desc');

    if ($filter !== 'all') {
        $query->where('etat', $filter);
    }

    $commandes = $query->get();

    $countEnCours   = Contact::where('etat', 'en cours')->count();
    $countTerminees = Contact::where('etat', 'terminée')->count();
    $countVendues   = Contact::where('etat', 'vendue')->count();
    $countAnnulees  = Contact::where('etat', 'annulée')->count();

    return view('contacts.index', compact(
        'commandes',
        'countEnCours',
        'countTerminees',
        'countVendues',
        'countAnnulees',
        'filter'
    ));
}


public function confirmerCommande($id)
{
    $contact = Contact::findOrFail($id);
    $contact->etat = 'terminée';
    $contact->save();

    return redirect()->back()->with('success', 'Commande confirmée');
}

public function vendreCommande($id)
{
    $contact = Contact::findOrFail($id);
    $contact->etat = 'vendue';
    $contact->save();

    return redirect()->back()->with('success', 'Commande vendue');
}

public function annulerCommande($id)
{
    $contact = Contact::findOrFail($id);
    $contact->etat = 'annulée';
    $contact->save();

    return redirect()->back()->with('success', 'Commande annulée');
}

public function destroy($id)
{
    $contact = Contact::findOrFail($id);
    $contact->delete();

    return redirect()->back()->with('success', 'Commande supprimée');
}

public function destroyOrder($id)
{
    try {
        $order = Order::findOrFail($id);
        $order->delete();

        return redirect()->back()->with('success', 'Commande supprimée avec succès.');
    } catch (\Exception $e) {
        return redirect()->back()->with('error', 'Erreur lors de la suppression de la commande.');
    }
}


public function showContactForm(Request $request)
{
    $part = $request->query('part', ''); // Récupère la partie depuis la query string, sinon défini une valeur vide par défaut

    // Si un paramètre "part" est présent, afficher le formulaire de commande (contacter)
    if (!empty($part)) {
        return view('contacter', compact('part'));
    }

    // Sinon, afficher la page de contact avec Google Maps et le formulaire de contact
    return view('contact');
}

public function storeContact(Request $request)
{
    // Validation des données du formulaire
    $validated = $request->validate([
        'nom' => 'required|string|max:255',
        'numero' => 'required|string|max:20',
        'email' => 'required|email|max:255',
        'ville' => 'nullable|string|max:255',
        'part' => 'nullable|string|max:255',
        'prix' => 'nullable|string|max:50', // Ajout du prix (nullable car pas toujours présent)
        'objet' => 'nullable|string|max:255', // Ajout de l'objet de la demande
        'message' => 'nullable|string', // Ajout du message
    ]);

    // Insertion des données dans la base de données
    Contact::create([
        'nom' => $request->input('nom'),
        'numero' => $request->input('numero'),
        'email' => $request->input('email'),
        'ville' => $request->input('ville') ?: 'Non précisée', // Valeur par défaut pour compatibilité
        'part' => $request->input('part') ?: ($request->input('objet') ?: 'Contact'), // Valeur par défaut
        'prix' => $request->input('prix') ?? '', // Ajout du prix (chaîne vide si absent)
        'objet' => $request->input('objet'),
        'message' => $request->input('message'),
    ]);

    // Envoi d'un email de notification pour les messages de contact
    try {
        $mailable = new \App\Mail\CommandeAdminNotification('Contact', [
            'Nom' => $request->input('nom'),
            'Email' => $request->input('email'),
            'Téléphone' => $request->input('numero'),
            'Objet' => $request->input('objet') ?: ($request->input('part') ?: 'N/A'),
            'Message' => $request->input('message') ?: ($request->input('ville') ?: 'N/A'),
            'Date' => now()->format('d/m/Y H:i'),
        ]);

        \Illuminate\Support\Facades\Mail::to([
            env('NOTIFICATION_EMAIL_FORMATION', 'formation@monprofchezmoi-ci.com'),
            env('NOTIFICATION_EMAIL_INSCRIPTION', 'inscription@monprofchezmoi-ci.com'),
        ])->send($mailable);
    } catch (\Exception $e) {
        \Illuminate\Support\Facades\Log::error('Erreur envoi email contact: ' . $e->getMessage());
    }

    // Redirection vers la page de confirmation
    return redirect()->route('particuliers.contact.confirmation');
}

public function filterCourses($formationId, Request $request)
{
    $formation = Formation::with(['sousFormations' => function ($query) {
        $query->with('cours');
    }])->findOrFail($formationId);

    // 🔑 Récupérer les IDs cochés
    $sousFormationIds = $request->input('sousFormation', []);

    // ✅ Forcer tableau même si une seule case est cochée
    if (!is_array($sousFormationIds)) {
        $sousFormationIds = [$sousFormationIds];
    }

    if (!empty($sousFormationIds)) {
        $filteredSousFormations = $formation->sousFormations->whereIn('id', $sousFormationIds);
        $cours = $filteredSousFormations->flatMap(function ($sousFormation) {
            return $sousFormation->cours;
        });
    } else {
        $cours = $formation->sousFormations->flatMap(function ($sousFormation) {
            return $sousFormation->cours;
        });
    }

    // ✅ Paginer à la main
    $page = $request->get('page', 1);
    $perPage = 7;

    $pagedCours = new LengthAwarePaginator(
        $cours->forPage($page, $perPage),
        $cours->count(),
        $perPage,
        $page,
        ['path' => $request->url(), 'query' => $request->query()]
    );

    return view('sous_formations', [
        'formation' => $formation,
        'sousFormations' => $formation->sousFormations,
        'cours' => $pagedCours,
        'sousFormationIds' => $sousFormationIds, // ✅ toujours tableau
    ]);
}

public function showRegisterForm()
{
    return view('comm.auth.register');
}

public function showLoginForm()
{
    return view('comm.auth.login');
}
public function register(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:comm',
        'password' => 'required|string|min:8|confirmed',
    ]);

    $comm = Comm::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => bcrypt($request->password),
    ]);

    session(['comm_id' => $comm->id]);

    return redirect('/particuliers/dashboardadmin');
}
public function login(Request $request)
{
    // Validation
    $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);

    $credentials = $request->only('email', 'password');
    $remember = $request->has('remember');

    // Auth avec Remember Me
    if (Auth::attempt($credentials, $remember)) {
        $request->session()->regenerate(); // protège contre le session fixation
        return redirect()->intended('/particuliers/dashboardadmin');
    }

    // Si Auth échoue, vérifie manuellement dans Comm (si tu utilises un modèle custom)
    $comm = Comm::where('email', $request->email)->first();

    if ($comm && Hash::check($request->password, $comm->password)) {
    session(['comm_id' => $comm->id]); // stocke l’ID en session
    return redirect('/particuliers/dashboardadmin');
}


    // Sinon retour avec erreur
    return back()->withErrors([
        'email' => 'Identifiants incorrects',
    ]);
}
public function logout()
{
    session()->forget('comm_id');
    return redirect('/particuliers/comm/login');
}




public function marquerVenduOrder($id)
{
    $order = Order::findOrFail($id);
    if($order->etat === 'terminée') {
        $order->etat_vendu_annule = 'vendu';
        $order->save();
    }
    return back();
}

public function marquerAnnuleOrder($id)
{
    $order = Order::findOrFail($id);
    if($order->etat === 'terminée') {
        $order->etat_vendu_annule = 'annule';
        $order->save();
    }
    return back();
}





}
