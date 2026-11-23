<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Video;   

class HomeController extends Controller
{
    public function index()
    {
        // Récupérer toutes les vidéos depuis la base de données
        $videos = Video::all();

        // Passer les vidéos à la vue 'home'
        return view('home', ['videos' => $videos]);
    }
}
