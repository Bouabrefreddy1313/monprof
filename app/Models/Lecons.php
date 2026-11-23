<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lecons extends Model
{
    use HasFactory;

    protected $fillable = [
        'matiere_id',
        'titre',
        'contenu',
        'video_url',
        
    ];

      // Définition de la relation avec le modèle Matiere
      public function matiere()
      {
          return $this->belongsTo(Matiere::class);
      }
      
       public function payments()
    {
        return $this->belongsToMany(Payment::class, 'lecon_payment', 'lecon_id', 'payment_id');
    }
}
