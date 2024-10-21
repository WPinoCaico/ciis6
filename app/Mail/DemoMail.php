<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class DemoMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        /* return $this->subject('Mail from Nicesnippets.com')
                    ->view('emails.demoMail2'); */
        //return $this->markdown('emails.demoMail');
        return $this
        ->subject('Gracias por registrarse.')
        ->markdown('emails.demoMail3');
    }
}
