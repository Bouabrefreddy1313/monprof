<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;
    // Définir la table associée (optionnel si le nom de la table est la version plurielle du modèle, ici 'payments')
    protected $table = 'payments';

    // Les champs qui peuvent être remplis
    protected $fillable = [
        'user_id',
        'transaction_id',
        'amount',
        'currency',
        'description',
        'customer_name',
        'customer_surname',
        'customer_email',
        'customer_phone_number',
        'status',
    ];

    // Si vous avez des dates à traiter comme des objets Carbon
    protected $dates = [
        'created_at',
        'updated_at',
    ];

    // Relation avec le modèle User (un paiement appartient à un utilisateur)
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
     public function lecons()
    {
        return $this->belongsToMany(Lecons::class, 'lecon_payment', 'payment_id', 'lecon_id');
    }

    // Vous pouvez ajouter d'autres relations ou méthodes personnalisées ici
}
