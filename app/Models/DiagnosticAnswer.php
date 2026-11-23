<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DiagnosticAnswer extends Model
{
    use HasFactory;

    protected $fillable = [
        'session_id',
        'question_id',
        'question_identifier',
        'question_label',
        'reponse',
    ];

    public function session()
    {
        return $this->belongsTo(DiagnosticSession::class, 'session_id');
    }

    public function question()
    {
        return $this->belongsTo(Question::class, 'question_id');
    }

    public function getParsedReponseAttribute()
    {
        $decoded = json_decode($this->reponse, true);
        return (json_last_error() === JSON_ERROR_NONE) ? $decoded : $this->reponse;
    }
}
