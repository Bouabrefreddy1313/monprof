<?php

namespace App\Http\Controllers;

use App\Models\Rappel;
use Illuminate\Http\Request;

class RappelController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'nom' => ['required', 'string', 'max:255'],
            'telephone' => ['required', 'string', 'max:30'],
        ], [
            'nom.required' => 'Le nom est obligatoire.',
            'telephone.required' => 'Le numéro est obligatoire.',
        ]);

        Rappel::create([
            'nom' => $request->nom,
            'telephone' => $request->telephone,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Votre demande de rappel a bien été enregistrée.',
        ]);
    }

    public function index()
    {
        $rappels = Rappel::latest()->get();
        return view('admin.rappels.index', compact('rappels'));
    }
}
