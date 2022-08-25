<?php

namespace App\Mail;

use App\Models\Game;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class LeadToLead extends Mailable
{
    use Queueable, SerializesModels;

    private $game;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct( Game $_game )
    {
        $this->game = $_game;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mails.leadtoLead', [
            'game' => $this->game,
        ]);
    }
}
