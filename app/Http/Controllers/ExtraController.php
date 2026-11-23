<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ExtraController extends Controller
{
    public function terminale()
    {
       

        return view('terminale');
    }
    public function superieur()
    {
       

        return view('/superieur');
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
}
