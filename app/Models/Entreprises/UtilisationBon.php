<?php

namespace App\Models\Entreprises;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UtilisationBon extends Model
{
    protected $table = 'pro_utilisation_bons';

    use HasFactory;

    protected $fillable = ['bon_id', 'nom_client', 'formation'];

    public function bon()
    {
        return $this->belongsTo(Bon::class, 'bon_id', 'id');
    }
}