<?php

namespace App\Mail;

use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Bus\Queueable;

class UserCreatedMail extends Mailable
{
    use Queueable, SerializesModels;

    public $user;

    // TERIMA DATA USER
    public function __construct($user)
    {
        $this->user = $user;
    }

    // BUILD EMAIL
    public function build()
    {
        return $this->subject('Akun Anda Telah Dibuat')
                    ->view('emails.user-created');
    }
}