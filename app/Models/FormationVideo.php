<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormationVideo extends Model
{
    use HasFactory;

    protected $table = 'formation_videos';

    protected $fillable = [
        'titre',
        'description',
        'video_path',
        'formation_type', // 'dcg' ou 'dscg'
        'niveau', // exemple: '1', '2', '3' pour DCG1, DCG2, DCG3
        'matiere',
        'ordre', // pour ordonner les vidéos dans la formation
        'prix',
        'duree',
        'thumbnail',
    ];

    public function userAccess()
    {
        return $this->hasMany(UserVideoAccess::class, 'video_id');
    }

    public function paiements()
    {
        return $this->hasMany(PaiementVideo::class, 'video_id');
    }
}
