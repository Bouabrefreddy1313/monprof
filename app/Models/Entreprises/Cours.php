<?php

namespace App\Models\Entreprises;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cours extends Model
{
    protected $table = 'pro_cours';

    use HasFactory;

    protected $fillable = [
        'titre',
        'objectif',
        'lieu',
        'public_cible',
        'formateur',
        'prerequis',
        'programme',
        'duree',
        'tarif',
        'description',
        'image',
        'sous_formation_id',
        'eligible',
         'certifiante',
         'etiquette',
        
    ];
     protected $casts = [
        'eligible' => 'boolean',
        'certifiante'   => 'boolean',
       
    ];

    public function sousFormation()
    {
        return $this->belongsTo(SousFormation::class, 'sous_formation_id', 'id');
    }
    
     // Relation : un cours peut avoir plusieurs formateurs
    public function formateurs()
    {
        return $this->hasMany(Formateur::class, 'cours_id', 'id');
    }
    public function avis()
{
    return $this->hasMany(Avis::class, 'cours_id', 'id');
}
}