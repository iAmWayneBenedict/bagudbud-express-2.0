<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ApplicationVerfication extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {
       
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $address = 'bagudbudexpressph@gmail.com';
        $subject = 'Application Status';
        $name = 'Bagudbud-Express';

        return $this->view('emailTemplate.from_admin')
                    ->replyTo($address, $name)
                    ->subject($subject);
    }
}
