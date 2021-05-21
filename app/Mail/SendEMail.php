<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendEMail extends Mailable
{
    use Queueable, SerializesModels;


    public $demo;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($demo)
    {
        $this->demo = $demo;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('sltoxichess@gmail.com')
                    ->view('mail')
                    ->text('mail_plano')
                    ->with(
                        [
                            'testVarOne' => '1',
                            'testVarTwo' => '2',
                        ]
                        );
    }
}
