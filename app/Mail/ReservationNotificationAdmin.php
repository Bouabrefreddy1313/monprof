<?php

namespace App\Mail;

use App\Models\Reservation;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ReservationNotificationAdmin extends Mailable
{
    use Queueable, SerializesModels;

    public $reservation;

    public function __construct(Reservation $reservation)
    {
        $this->reservation = $reservation;
    }

    public function build()
    {
        return $this->subject('Nouvelle réservation - ' . $this->reservation->cours->titre)
                    ->view('emails.reservation_admin')
                    ->with([
                        'reservation' => $this->reservation,
                    ]);
    }
}
