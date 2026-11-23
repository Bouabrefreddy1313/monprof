<?php

namespace App\Mail;

use App\Models\VoucherOrder;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class VoucherPurchasedMail extends Mailable
{
    use Queueable, SerializesModels;

    public VoucherOrder $order;

    public function __construct(VoucherOrder $order)
    {
        $this->order = $order;
    }

    public function build()
    {
        return $this->subject('🎁 Votre code de Bon Cadeau Formation : ' . $this->order->code)
                    ->view('emails.vouchers.purchased')
                    ->with([
                        'order' => $this->order,
                        'voucher' => $this->order->voucher,
                    ]);
    }
}
