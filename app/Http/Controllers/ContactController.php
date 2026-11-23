<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function consulter()
    {
        $commandesEnCours = Contact::where('etat', 'en_cours')
            ->orderBy('created_at', 'desc')
            ->get();

        $commandesConfirmees = Contact::where('etat', 'confirmée')
            ->orderBy('created_at', 'desc')
            ->get();

        $commandesVendues = Contact::where('etat', 'vendue')
            ->orderBy('created_at', 'desc')
            ->get();

        $commandesAnnulees = Contact::where('etat', 'annulée')
            ->orderBy('created_at', 'desc')
            ->get();

        $countEnCours = $commandesEnCours->count();
        $countConfirmees = $commandesConfirmees->count();
        $countVendues = $commandesVendues->count();

        return view('contacts.index', compact(
            'commandesEnCours',
            'commandesConfirmees',
            'commandesVendues',
            'commandesAnnulees',
            'countEnCours',
            'countConfirmees',
            'countVendues'
        ));
    }

    public function confirmerCommande($id)
    {
        $contact = Contact::findOrFail($id);
        $contact->etat = 'confirmée';
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

    public function ajouterCommentaire(Request $request, $id)
    {
        $contact = Contact::findOrFail($id);
        $contact->commentaire = $request->input('commentaire');
        $contact->save();

        return redirect()->back()->with('success', 'Commentaire ajouté');
    }

    public function destroy($id)
    {
        $contact = Contact::findOrFail($id);
        $contact->delete();

        return redirect()->back()->with('success', 'Commande supprimée');
    }
}
