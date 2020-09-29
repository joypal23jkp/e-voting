<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class VerificationEmail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $full_name, $password;
    public function __construct($name, $pass)
    {
        $this->full_name = $name;
        $this->password = $pass;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $address = 'educats@gmail.com';
        $subject = 'This is a Password Email!';
        $name = 'Jane Doe';
        return $this->view('admin.auth.verify')
                    ->with(['name' => $this->full_name, 'password' => $this->password])
                    ->from($address, $name)
                    ->subject($subject);
    }
}
