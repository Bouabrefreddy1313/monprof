<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inscription extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom_parent',
        'nom_enfant',
        'age_enfant',
        'telephone',
        'email',
        'activite',
        'date_debut',
        'lieu',
        'jours',
        'horaire',
        'type_paiement',
        'mode_paiement',
        'frais_reservation',
        'prix_formule',
        'statut',
        'notes_admin',
        'date_contact',
        'token',
        'transaction_id',
        'mode_paiement_final',
        'date_paiement',
    ];

    protected $casts = [
        'jours' => 'array',
        'date_debut' => 'date',
        'date_contact' => 'datetime',
        'frais_reservation' => 'decimal:2',
        'prix_formule' => 'decimal:2',
    ];

    // Scopes pour filtrer facilement
    public function scopeEnAttente($query)
    {
        return $query->where('statut', 'en_attente');
    }

    public function scopeContactes($query)
    {
        return $query->where('statut', 'contacte');
    }

    public function scopeConfirmes($query)
    {
        return $query->where('statut', 'confirme');
    }

    // Accessor pour le label du statut
    public function getStatutLabelAttribute(): string
    {
        return match($this->statut) {
            'en_attente' => 'En attente',
            'contacte' => 'Contacté',
            'confirme' => 'Confirmé',
            'annule' => 'Annulé',
            default => 'Inconnu',
        };
    }

    // Accessor pour le label du lieu
    public function getLieuLabelAttribute(): string
    {
        return match($this->lieu) {
            'domicile' => 'À domicile',
            'en_ligne' => 'En ligne',
            'centre' => 'Au centre',
            default => 'Non précisé',
        };
    }

    // Accessor pour le label du type de paiement
    public function getTypePaiementLabelAttribute(): string
    {
        return match($this->type_paiement) {
            'unique' => 'Paiement unique',
            'seance' => 'Par séance',
            'abonnement' => 'Abonnement mensuel',
            default => 'Non précisé',
        };
    }

    // Accessor pour le label du mode de paiement
    public function getModePaiementLabelAttribute(): string
    {
        return match($this->mode_paiement) {
            'mobile_money' => 'Mobile Money',
            'virement' => 'Virement bancaire',
            default => 'Non précisé',
        };
    }
}
