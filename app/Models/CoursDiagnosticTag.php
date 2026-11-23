<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CoursDiagnosticTag extends Model
{
    use HasFactory;

    protected $fillable = [
        'cours_id',
        'type_tag',
        'valeur',
        'est_suggere',
        'est_valide',
    ];

    protected $casts = [
        'est_suggere' => 'boolean',
        'est_valide' => 'boolean',
    ];

    public function cours()
    {
        return $this->belongsTo(Cours::class, 'cours_id');
    }
}
