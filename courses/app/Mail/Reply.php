<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class Reply extends Mailable
{
    use Queueable, SerializesModels;

    protected $message;
    protected $reply;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($message,$reply)
    {
        $this->message = $message;
        $this->reply = $reply;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $contactMessage = $this->message;
        $reply = $this->reply;

        return $this->from('shadyelgin60@gmail.com')->subject('Shady Osama')
            ->view('BackEnd.messages.reply')->with(['contactMessage' => $contactMessage , 'reply' => $reply]);
    }
}
