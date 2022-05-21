<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendOTP extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $address = 'bagudbudexpressph@gmail.com';
        $subject = 'Change Password OTP code';
        $name = 'Bagudbud-Express';

        return $this->view('emailTemplate.sendOTP')
                    ->replyTo($address, $name)
                    ->subject($subject)
                    ->with([ 'code' => $this->data['code'] ]);
    }
}
