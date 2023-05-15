<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class MailNotify extends Mailable
{
    use Queueable, SerializesModels;

    public $data=[];

    /**
     * Create a new message instance.
     */
    public function __construct($data)
    {
        $this->data= $data;
    }

    
    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        if($this->data["subject"]==='Demande Acceptée'){
            return $this->from('m.elayady2pointlogic@gmail.com', 'Emarkets Annuaire')
            ->subject($this->data["subject"])->view('emails.demande_accepter')->with("data",$this->data);}
        else{
            return $this->from('m.elayady2pointlogic@gmail.com', 'Emarkets Annuaire')
            ->subject($this->data["subject"])->view('emails.demande_rejetee')->with("data",$this->data);
        }
    }
}
