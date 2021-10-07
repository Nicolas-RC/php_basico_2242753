<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ChagePasswordMail extends Mailable
{
    use Queueable, SerializesModels;

    public $idUser;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($idUser)
    {
        $this->idUser = $idUser;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Change your password')->view('email.changePassword');
    }
}
