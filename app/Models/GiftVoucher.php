<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GiftVoucher extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
        'title',
        'amount',
        'description',
        'status',
        'purchaser_id',
        'purchaser_email',
        'purchaser_phone',
        'beneficiary_email',
        'message',
        'expires_at',
        'pdf_path',
        'token',
        'transaction_id',
        'date_paiement',
    ];
}
