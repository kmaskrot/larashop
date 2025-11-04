<?php

namespace App\Mail;

use App\Models\ConfirmationCode;
use App\Services\ConfirmationCodeService;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ConfirmationCodeMail extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(public ConfirmationCode $confirmationCode)
    {
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Confirmation Code',
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.confirmation-code',
            with: [
                'timeSinceLastAttempt' =>  ConfirmationCodeService::getTimeSinceLastAttempt($this->confirmationCode)
            ]
        );
    }

    public function attachments(): array
    {
        return [];
    }
}
