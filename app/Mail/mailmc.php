<?php
  
namespace App\Mail;
   
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
  
class mailmc extends Mailable
{
    use Queueable, SerializesModels;
  
    public $details;
    public $diff;
   
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($details, $diff)
    {
        $this->details = $details;
        $this->diff = $diff;
    }
   
    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('New MC is issued')
                    ->view('emailmc');
    }
}