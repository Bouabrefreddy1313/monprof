<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormationParcoursMapping extends Model
{
    use HasFactory;

    protected $table = 'formation_parcours_mapping';

    protected $fillable = [
        'formation_id',
        'sous_formation_id',
        'parcours',
    ];

    public function formation()
    {
        return $this->belongsTo(Formation::class, 'formation_id');
    }

    public function sousFormation()
    {
        return $this->belongsTo(SousFormation::class, 'sous_formation_id');
    }
}
