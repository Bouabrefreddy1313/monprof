<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;

    protected $fillable = [
        'parcours',
        'code_identifiant',
        'titre',
        'description',
        'type_champ',
        'est_obligatoire',
        'ordre',
        'est_actif',
    ];

    protected $casts = [
        'est_obligatoire' => 'boolean',
        'est_actif' => 'boolean',
        'ordre' => 'integer',
    ];

    public function options()
    {
        return $this->hasMany(QuestionOption::class, 'question_id')->orderBy('ordre');
    }

    public function rules()
    {
        return $this->hasMany(QuestionRule::class, 'question_id');
    }

    public function answers()
    {
        return $this->hasMany(DiagnosticAnswer::class, 'question_id');
    }
}
