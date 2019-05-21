<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class Email extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($customer)
    {
        //
        $this->customer = $customer;
        var_dump($this->customer);
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('email.contact')->with([
            'name' => $this->customer['name'],
            'email' => $this->customer['email'],
            'subject' => $this->customer['subject'],
            'bodyMessage' => $this->customer['message']
        ]);
    }
}
