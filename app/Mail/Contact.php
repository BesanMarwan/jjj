<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Contact extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $data;
    public function __construct($data)
    {
        $this->user_name  = $data['user_name'];
        $this->user_email = $data['user_email'];
        $this->subject    = $data['subject'];
        $this->message    = $data['message'];
//        $this->data=$data;

  }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('front.pages.mails.contactMail')
//                 ->with('data');
                   ->with('user_name' ,$this->user_name)
                    ->with('user_email',$this->user_email)
                    ->with('subject'   ,$this->subject)
                    ->with('message'   ,$this->message);

    }
}
