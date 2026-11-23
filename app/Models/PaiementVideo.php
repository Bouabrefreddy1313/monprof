<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaiementVideo extends Model
{
    use HasFactory;

    protected $table = 'paiement_videos';

    protected $fillable = [
        'user_id',
        'video_id',
        'transaction_id',
        'montant',
        'methode_paiement', // 'cinetpay', 'wave', 'orange_money'
        'statut', // 'en_attente', 'complete', 'echec'
        'date_paiement',
    ];

    protected $casts = [
        'date_paiement' => 'datetime',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function video()
    {
        return $this->belongsTo(FormationVideo::class, 'video_id');
    }

    public function access()
    {
        return $this->hasOne(UserVideoAccess::class, 'paiement_video_id');
    }
}
