<?php

namespace App\Models\Entreprises;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DemandeDevis extends Model
{
    protected $table = 'pro_demande_devis';

    use HasFactory;

    protected $fillable = ['nom', 'prenom', 'numero', 'email', 'ville', 'cours_id'];

    public function cours()
    {
        return $this->belongsTo(Cours::class, 'cours_id', 'id');
    }
}