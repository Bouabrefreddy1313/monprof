<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserVideoAccess extends Model
{
    use HasFactory;

    protected $table = 'user_video_access';

    protected $fillable = [
        'user_id',
        'video_id',
        'paiement_video_id',
        'acces_jusquau', // date d'expiration de l'accès
    ];

    protected $casts = [
        'acces_jusquau' => 'datetime',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function video()
    {
        return $this->belongsTo(FormationVideo::class, 'video_id');
    }

    public function paiement()
    {
        return $this->belongsTo(PaiementVideo::class, 'paiement_video_id');
    }

    // Vérifie si l'accès est toujours valide
    public function getEstValideAttribute()
    {
        return $this->acces_jusquau > now();
    }
}
