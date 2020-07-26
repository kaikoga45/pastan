<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ForgetPass extends Mailable
{
    use Queueable, SerializesModels;

    public $data_user_forget_pass;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data_user_forget_pass)
    {
        $this->data_user_forget_pass = $data_user_forget_pass;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('no-reply@pasartanawangko.my.id')->subject('Lupa Kata Sandi')->markdown('email.forget-password')->with('data_user_forget_pass', $this->data_user_forget_pass);
    }
}
