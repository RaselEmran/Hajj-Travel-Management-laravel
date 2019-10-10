<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class SubscribeMail extends Mailable
{
    use Queueable, SerializesModels;
    public $messege;
     public $subject;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($messege,$subject)
    {
        $this->messege = $messege;
        $this->subject = $subject;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $messege =$this->messege;
        $subject =$this->subject;
        return $this->markdown('emails.subscribe',compact('messege','subject'))
        ->subject($subject);
    }
}
