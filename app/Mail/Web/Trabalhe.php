<?php

namespace App\Mail\Web;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Markdown;

class Trabalhe extends Mailable
{
    use Queueable, SerializesModels;

    private $data;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(array $data)
    {
        $this->data = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $this->replyTo($this->data['reply_email'], $this->data['reply_name']);
        $this->to($this->data['siteemail'], $this->data['sitename']);
        $this->cc('suporte@informaticalivre.com.br');
        $this->from($this->data['siteemail'], $this->data['sitename']);
        $this->subject('#Curriculum: ' . $this->data['reply_name']);
        if(!empty($this->data['curriculo'])){            
            $this->attach($this->data['curriculo']->getRealPath(), array(
                'as'   => $this->data['curriculo']->getClientOriginalName(), 
                'mime' => $this->data['curriculo']->getMimeType()));
                     
        }        
        $this->markdown('emails.trabalhe', [
            'nome' => $this->data['reply_name'],
            'email' => $this->data['reply_email'],
            'telefone' => $this->data['telefone']
        ]);
        return $this;
    }
}
