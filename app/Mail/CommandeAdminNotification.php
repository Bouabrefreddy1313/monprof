<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class CommandeAdminNotification extends Mailable
{
    use Queueable, SerializesModels;

    public $type;
    public $data;

    public function __construct(string $type, $data)
    {
        $this->type = $type;
        $this->data = $data;
    }

    public function build()
    {
        $subject = 'Nouvelle commande - ' . $this->type;
        return $this->subject($subject)
                    ->view('emails.commande_admin')
                    ->with([
                        'type' => $this->type,
                        'data' => $this->data,
                    ]);
    }
}
