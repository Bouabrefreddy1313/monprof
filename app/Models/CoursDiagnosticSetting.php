<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CoursDiagnosticSetting extends Model
{
    use HasFactory;

    protected $fillable = [
        'cours_id',
        'actif_diagnostic',
        'priorite',
        'message_recommandation',
    ];

    protected $casts = [
        'actif_diagnostic' => 'boolean',
        'priorite' => 'integer',
    ];

    public function cours()
    {
        return $this->belongsTo(Cours::class, 'cours_id');
    }
}
