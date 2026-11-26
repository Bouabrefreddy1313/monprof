<?php

namespace App\Models\Entreprises;

use Illuminate\Database\Eloquent\Model;

class Catalogue extends Model
{
    protected $table = 'pro_catalogues';

    protected $fillable = ['titre', 'domaine_id', 'fichier'];

    public function domaine()
    {
        return $this->belongsTo(Domaine::class, 'domaine_id', 'id');
    }
}
