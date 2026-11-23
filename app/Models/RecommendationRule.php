<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RecommendationRule extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom_critere',
        'type_critere',
        'poids',
        'est_obligatoire',
        'description',
    ];

    protected $casts = [
        'poids' => 'integer',
        'est_obligatoire' => 'boolean',
    ];
}
