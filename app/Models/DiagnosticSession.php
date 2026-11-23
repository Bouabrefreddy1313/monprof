<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DiagnosticSession extends Model
{
    use HasFactory;

    protected $fillable = [
        'session_token',
        'statut',
        'parcours_choisi',
        'date_debut',
        'date_fin',
        'derniere_question_atteinte',
        'utm_source',
        'utm_medium',
        'utm_campaign',
        'page_entree',
        'referrer',
        'appareil',
        'ip_address',
    ];

    protected $casts = [
        'date_debut' => 'datetime',
        'date_fin' => 'datetime',
    ];

    public function answers()
    {
        return $this->hasMany(DiagnosticAnswer::class, 'session_id');
    }

    public function lead()
    {
        return $this->hasOne(Lead::class, 'session_id');
    }
}
