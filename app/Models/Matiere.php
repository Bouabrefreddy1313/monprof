<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Matiere extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'nom',
        'description',
        'image',
        'type',
        'prix',
        'admin_id',

        
    ];

     // Définition de la relation avec le modèle Lecon
     public function lecons()
     {
         return $this->hasMany(Lecon::class);
     }
}
