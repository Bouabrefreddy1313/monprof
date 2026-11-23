<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use App\Models\GiftVoucher;
use Illuminate\Support\Facades\Storage;

class GiftVoucherMail extends Mailable
{
    use Queueable, SerializesModels;

    public $voucher;

    public function __construct(GiftVoucher $voucher)
    {
        $this->voucher = $voucher;
    }

    public function build()
    {
        $mail = $this->subject('Votre bon de formation ' . $this->voucher->code)
                     ->markdown('emails.vouchers.gift')
                     ->with(['voucher' => $this->voucher]);

        if ($this->voucher->pdf_path && Storage::disk('public')->exists($this->voucher->pdf_path)) {
            $mail->attach(storage_path('app/public/' . $this->voucher->pdf_path), [
                'as' => $this->voucher->code . '.pdf',
                'mime' => 'application/pdf',
            ]);
        }

        return $mail;
    }
}
