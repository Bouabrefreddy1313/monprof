<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use App\Models\Subscriber;

class CampaignMail extends Mailable
{
    use Queueable, SerializesModels;

    public $subjectLine;
    public $subscriber;
    public $template;
    public $courses;
    public $bodyContent;

    /**
     * @param string          $subjectLine Objet de l'email
     * @param Subscriber|null $subscriber  Abonné (campagne ciblée). Peut aussi être
     *                                     une chaîne (contenu libre) pour l'envoi
     *                                     manuel depuis l'admin.
     * @param string          $template    Vue Blade à utiliser
     * @param mixed           $courses     Cours à mettre en avant
     */
    public function __construct($subjectLine, $subscriber = null, $template = 'emails.campaign', $courses = null)
    {
        $this->subjectLine = $subjectLine;

        // Compatibilité avec l'ancien envoi manuel admin :
        // `CampaignMail($subject, $body)` où le 2e argument était le contenu.
        if (is_string($subscriber)) {
            $this->bodyContent = $subscriber;
            $this->subscriber = null;
            $this->template = 'emails.campaign';
        } else {
            $this->bodyContent = null;
            $this->subscriber = $subscriber;
            $this->template = $template ?: 'emails.campaigns.general';
        }

        $this->courses = $courses;
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: $this->subjectLine,
        );
    }

    public function content(): Content
    {
        return new Content(
            view: $this->template,
            with: ['courses' => $this->courses],
        );
    }

    public function attachments(): array
    {
        return [];
    }
}
