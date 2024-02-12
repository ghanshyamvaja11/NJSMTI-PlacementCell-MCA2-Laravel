<?php
namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendMail extends Mailable
{
    use Queueable, SerializesModels;

    public $recipient;
    public $subject;
    public $msgs;

    public function __construct($recipient, $subject, $msgs)
    {
        $this->recipient = $recipient;
        $this->subject = $subject;
        $this->msgs = $msgs;
    }

    public function build()
    {
        return $this->to($this->recipient)
            ->subject($this->subject)
            ->view('mail');
    }
}