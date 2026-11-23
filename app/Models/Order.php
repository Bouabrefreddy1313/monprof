<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom', 'email', 'numero', 'commune', 'cours', 'cours_id', 'etat','mode_de_formation','prix','duree'
    ];
    
    // Relation avec le modèle Cours
    public function coursRelation()
    {
        return $this->belongsTo(\App\Models\Cours::class, 'cours_id');
    }
}