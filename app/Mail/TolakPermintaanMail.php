<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class TolakPermintaanMail extends Mailable
{
    use Queueable, SerializesModels;

    public $fungsi;
    public $SA;

    public function __construct($fungsi, $SA)
    {
        $this->fungsi = $fungsi;
        $this->SA = $SA;
        $this->subject('Permintaan Barang Ditolak');
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Permintaan Barang Ditolak',
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'permintaan.tolak_permintaan', 
        );
    }

    public function attachments(): array
    {
        return [];
    }
}
