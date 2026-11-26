<?php

namespace App\Models\Entreprises;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bon extends Model
{
    protected $table = 'pro_bons';

    use HasFactory;

    protected $fillable = ['titre', 'description', 'montant', 'code_unique', 'statut'];

    public static function boot()
    {
        parent::boot();
        static::creating(function ($bon) {
            $bon->code_unique = uniqid('BON_'); // Générer un code unique
        });
    }
}