<?php

namespace App\Models\Entreprises;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Formateur extends Model
{
    protected $table = 'pro_formateurs';

    use HasFactory;

    protected $fillable = [
        'cours_id',
        'nom',
        'slug',
        'photo',
        'fonction_actuelle',
        'domaines_intervention',
        'domaines_expertise',
        'parcours_professionnel_academique',
        'style_pedagogique',
        'devise_philosophie',
        'actif',
    ];

    protected $casts = [
        'actif' => 'boolean',
    ];

    // Relation : un formateur appartient à un cours
    public function cours()
    {
        return $this->belongsTo(Cours::class, 'cours_id', 'id');
    }

    protected static function boot()
    {
        parent::boot();
        
        static::creating(function ($formateur) {
            if (empty($formateur->slug)) {
                $formateur->slug = Str::slug($formateur->nom);
            }
        });

        static::updating(function ($formateur) {
            if ($formateur->isDirty('nom')) {
                $formateur->slug = Str::slug($formateur->nom);
            }
        });
    }
}