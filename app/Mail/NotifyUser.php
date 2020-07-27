<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class NotifyUser extends Mailable
{
    use Queueable, SerializesModels;

    public $data_notify;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data_notify)
    {
        $this->data_notify = $data_notify;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('no-reply@pasartanawangko.my.id')->subject('Notifikasi Pesanan')->markdown('email.notify-user')->with('data_notify', $this->data_notify);
    }
}
