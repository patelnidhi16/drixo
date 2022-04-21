<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ApproveMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($name,$subject_id,$title,$subject)
    {
        $this->name=$name;
        $this->subject_id=$subject_id;
        $this->title=$title;
        $this->subject=$subject;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('auth.approvemail')->with('name',$this->name)->with('subject_id',$this->subject_id)->with('title',$this->title)->with('subject',$this->subject);
    }
}
