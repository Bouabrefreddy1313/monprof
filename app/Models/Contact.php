<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom',
        'email',
        'numero',
        'ville',
        'part',
        'prix',
        'objet',
        'message',
        'commentaire',
        'etat'
    ];
    
     protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    public function getStateAttribute()
    {
        return $this->etat;
    }
}
