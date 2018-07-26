<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class registerUser extends Mailable
{
    use Queueable, SerializesModels;

    private $token, $user;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($token, $user)
    {
        $this->token = $token;
        $this->user = $user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.register')->with([
            'token' => $this->token,
            'user'  => $this->user
        ]);
    }
}
