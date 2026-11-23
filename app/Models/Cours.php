<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cours extends Model
{
    protected $fillable = [
        'titre', 'formation_id', 'sous_formation_id', 'description','heure', 'lieu', 'prix', 'programme', 'objectif', 'cible', 'image',
        'prerequis',   // ➕ nouveau champ
        'formateur',
         'methodes_pedagogiques', // ➕ ajouté
    'evaluation', // ➕ nouveau champ
    'duree', // ➕ Durée du cours
    'prix_individuel', // ➕ Prix individuel
    'prix_groupe', // ➕ Prix de groupe
    'public_concerne', // ➕ Public concerné
    ];

    public function formation()
    {
        return $this->belongsTo(Formation::class);
    }

    public function sousFormation()
    {
        return $this->belongsTo(SousFormation::class);
    }
    // Course.php
public function orders()
{
    return $this->hasMany(Order::class, 'cours_id');
}

    /**
     * Niveau du cours : attribué de façon pseudo-aléatoire mais STABLE
     * pour chaque cours (ne change pas d'un rafraîchissement à l'autre).
     */
    public function getNiveauAttribute(): string
    {
        $niveaux = ['Débutant', 'Intermédiaire', 'Avancé', 'Expert'];
        // sprintf('%u') garantit une valeur non signée (crc32 peut être négatif)
        $seed = sprintf('%u', crc32($this->formation_id . '|' . $this->id . '|' . $this->titre));
        return $niveaux[$seed % count($niveaux)];
    }

    public function diagnosticSetting()
    {
        return $this->hasOne(CoursDiagnosticSetting::class, 'cours_id');
    }

    public function diagnosticTags()
    {
        return $this->hasMany(CoursDiagnosticTag::class, 'cours_id');
    }

    public function leads()
    {
        return $this->hasMany(Lead::class, 'cours_recommande_id');
    }
}
