<?php

namespace App\Http\Controllers\Entreprises;


use App\Http\Controllers\Controller;
use App\Models\Entreprises\Bon;
use Illuminate\Http\Request;

class BonController extends Controller
{
    public function index()
    {
        $bons = Bon::where('statut', 'actif')->get();
        return view('entreprises.bons.index', compact('bons'));
    }

    public function show(Bon $bon)
    {
        return view('entreprises.bons.show', compact('bon'));
    }
}