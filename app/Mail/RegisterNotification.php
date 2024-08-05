<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Attachment;

class RegisterNotification extends Mailable
{
    use Queueable, SerializesModels;

    public $mail;
    /**
     * Create a new message instance.
     */
    public function __construct($mail)
    {
        $this->mail = $mail;
    }
    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Register Notification',
        );
    }
    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.user_login_notification',
        );
    }
    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [
            Attachment::fromPath('/path/to/file')
                ->as('Photo Name')
                ->withMime('image/jpeg')
        ];
    }
    public function build()
    {
        return $this->subject('Login Notification')
            ->view('emails.user_login_notification');
    }
}
