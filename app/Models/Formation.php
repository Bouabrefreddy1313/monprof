<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Formation extends Model
{
    protected $fillable = ['titre',  'pourquoi', 'qui','importance', 'description', 'categorie' ];

    public function sousFormations()
    {
        return $this->hasMany(SousFormation::class);
    }

    public function cours()
    {
        return $this->hasMany(Cours::class, 'formation_id');
    }

    /**
     * Liste des groupes de thématiques auxquels appartient la formation.
     * Valeurs possibles : transversale, metier (séparées par des virgules en base).
     */
    public function getCategoriesAttribute(): array
    {
        return array_values(array_filter(array_map('trim', explode(',', $this->categorie ?? ''))));
    }

    public function inCategory(string $categorie): bool
    {
        return in_array($categorie, $this->categories, true);
    }

    /**
     * Accesseur pour obtenir le nombre total de cours de la formation :
     * somme des cours liés à chaque sous-formation de la formation
     * (sans double comptage), plus les cours directs sans sous-formation.
     */
    public function getTotalCoursCountAttribute(): int
    {
        $sousFormationIds = $this->sousFormations->pluck('id');

        return Cours::whereIn('sous_formation_id', $sousFormationIds)
            ->orWhere(function ($query) {
                $query->where('formation_id', $this->id)
                      ->whereNull('sous_formation_id');
            })
            ->count();
    }
}
