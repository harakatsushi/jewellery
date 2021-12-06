<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class PayMail extends Mailable
{
    use Queueable, SerializesModels;

    protected $name;
    protected $email;
    protected $detail;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($from_name,$to_name,$detail,$to)
    {
        $this->mailto = $to;
        $this->from_name = $from_name;
        $this->to_name = $to_name;
        $this->detail = $detail;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $view_name = 'emails.pay';
         $subject = '【ai-jewelly】'.$this->from_name.'様の仮支払いが行われました';


        return $this->text($view_name)
                    ->subject($subject)
                    ->with([
                        'from_name' => $this->from_name,
                        'detail' => $this->detail,
                        'to_name' => $this->to_name
                      ]);
    }
}