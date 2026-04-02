<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\Kontak;

class KontakMail extends Mailable
{
    use Queueable, SerializesModels;

    public $kontak;

    public function __construct(Kontak $kontak)
    {
        $this->kontak = $kontak;
    }

    public function build()
    {
        return $this->subject($this->kontak->subject)
                    ->view('emails.kontak') // view email
                    ->with([
                        'kontak' => $this->kontak  // pastikan variabel dikirim
                    ]);
    }
}
