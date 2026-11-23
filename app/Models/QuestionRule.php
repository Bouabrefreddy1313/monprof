<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuestionRule extends Model
{
    use HasFactory;

    protected $fillable = [
        'question_id',
        'source_question_identifier',
        'operateur',
        'valeur_attendue',
        'action',
        'target_question_identifier',
    ];

    public function question()
    {
        return $this->belongsTo(Question::class, 'question_id');
    }
}
