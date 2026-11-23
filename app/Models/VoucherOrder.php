<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VoucherOrder extends Model
{
    use HasFactory;

    protected $fillable = [
        'voucher_id',
        'phone',
        'amount_paid',
        'email',
        'code',
        'status',
        'is_used',
        'used_at',
        'formation_id',
        'notes',
    ];

    protected $casts = [
        'is_used' => 'boolean',
        'used_at' => 'datetime',
    ];

    // Relation avec GiftVoucher
    public function voucher()
    {
        return $this->belongsTo(GiftVoucher::class, 'voucher_id');
    }

    // Relation avec Formation
    public function formation()
    {
        return $this->belongsTo(Formation::class, 'formation_id');
    }

    /**
     * Génère un code unique pour le bon acheté (ex: BON-8K2P-9M4T)
     */
    public static function generateUniqueCode(): string
    {
        do {
            $code = 'BON-' . strtoupper(\Illuminate\Support\Str::random(4)) . '-' . strtoupper(\Illuminate\Support\Str::random(4));
        } while (self::where('code', $code)->exists());

        return $code;
    }
}
