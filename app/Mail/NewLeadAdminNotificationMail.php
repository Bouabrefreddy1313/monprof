<?php

namespace App\Mail;

use App\Models\Lead;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class NewLeadAdminNotificationMail extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public Lead $lead;

    public function __construct(Lead $lead)
    {
        $this->lead = $lead;
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: '🎯 Nouveau Lead Qualifié : ' . $this->lead->prenom . ' (' . ucfirst($this->lead->moyen_contact_prefere) . ')',
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.new-lead-admin',
        );
    }

    public function attachments(): array
    {
        return [];
    }
}
