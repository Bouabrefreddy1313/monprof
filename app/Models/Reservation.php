<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    protected $fillable = [
        'cours_id',
        'token',
        'nom',
        'telephone',
        'email',
        'ville',
        'message',
        'formule',
        'montant_total',
        'acompte',
        'solde',
        'statut', // 'en_attente', 'acompte_paye', 'paye', 'annule'
        'transaction_id',
        'places_reservees',
        'session',
    ];

    protected $casts = [
        'montant_total' => 'decimal:2',
        'acompte' => 'decimal:2',
        'solde' => 'decimal:2',
    ];

    public function cours()
    {
        return $this->belongsTo(Cours::class);
    }

    public function getStatutBadgeAttribute()
    {
        return match($this->statut) {
            'en_attente' => '<span class="badge bg-warning">En attente de paiement</span>',
            'acompte_paye' => '<span class="badge bg-success">Acompte payé</span>',
            'paye' => '<span class="badge bg-primary">Payé intégralement</span>',
            'annule' => '<span class="badge bg-danger">Annulé</span>',
            default => '<span class="badge bg-secondary">Inconnu</span>',
        };
    }
}
