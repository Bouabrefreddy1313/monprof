<?php

namespace App\Models\Entreprises;

use Illuminate\Database\Eloquent\Model;

class Avis extends Model
{
    protected $table = 'pro_avis';

    protected $fillable = [
        'cours_id',
        'nom',
        'etoiles',
        'commentaire'
    ];

    public function cours()
    {
        return $this->belongsTo(Cours::class, 'cours_id', 'id');
    }
}