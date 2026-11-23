<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable; // ✅ important
use Illuminate\Database\Eloquent\Model;

class Comm extends Model
{
    use HasFactory;

    protected $table = 'comm'; // Spécifie la table utilisée par le modèle
    protected $fillable = ['name', 'email', 'password'];
}