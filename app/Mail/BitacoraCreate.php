<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class BitacoraCreate extends Mailable
{
    use Queueable, SerializesModels;

    public $data;
    public $usuraio;
    public $archivo_user;

    /**
     * Create a new message instance.
     */
    public function __construct($data, $usuraio, $archivo_user)
    {
        $this->data = $data;
        $this->usuraio = $usuraio;
        $this->archivo_user = $archivo_user;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope    
    {
        return new Envelope(
            subject: 'Bitacora Create',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'mail.BitacoraCreate',
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
