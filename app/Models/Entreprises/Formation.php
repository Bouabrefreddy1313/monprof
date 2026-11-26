<?php

namespace App\Models\Entreprises;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Formation extends Model
{
    protected $table = 'pro_formations';

    use HasFactory;

    protected $fillable = [
        'nom',
        'description',
        'image',
        'pour_entreprise',
        'domaine_id',
    ];

    public function sousFormations()
    {
        return $this->hasMany(SousFormation::class, 'formation_id', 'id');
    }
    
    public function domaine()
    {
        return $this->belongsTo(Domaine::class, 'domaine_id', 'id');
    }
    public function cours()
{
    return $this->hasMany(Cours::class, 'formation_id', 'id');
}
}