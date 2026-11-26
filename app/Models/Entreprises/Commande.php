<?php

namespace App\Models\Entreprises;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commande extends Model
{
    protected $table = 'pro_commandes';

    use HasFactory;

    protected $fillable = ['bon_id', 'telephone', 'montant', 'email', 'statut'];
    
    public function bon()
    {
        return $this->belongsTo(Bon::class, 'bon_id', 'id');
    }
}