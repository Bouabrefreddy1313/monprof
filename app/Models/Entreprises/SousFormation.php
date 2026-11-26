<?php

namespace App\Models\Entreprises;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SousFormation extends Model
{
    protected $table = 'pro_sous_formations';

    use HasFactory;

    protected $fillable = [
        'nom',
        'description',
        'image',
        'formation_id',
    ];

    public function formation()
    {
        return $this->belongsTo(Formation::class, 'formation_id', 'id');
    }

    public function cours()
    {
        return $this->hasMany(Cours::class, 'sous_formation_id', 'id');
    }
}