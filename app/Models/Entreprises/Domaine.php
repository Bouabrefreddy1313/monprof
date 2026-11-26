<?php

namespace App\Models\Entreprises;

use Illuminate\Database\Eloquent\Model;

class Domaine extends Model
{
   
    protected $table = 'pro_domaines';

    protected $fillable = ['titre'];

    public function formations()
    {
        return $this->hasMany(Formation::class, 'domaine_id', 'id');
    }
}
