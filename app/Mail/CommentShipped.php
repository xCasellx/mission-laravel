<?php

namespace App\Mail;

use http\Env\Request;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class CommentShipped extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $data;
    private $parent;

    public function __construct($data, $parent)
    {
        $this->data = $data;
        $this->parent = $parent;
    }
    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $page = $this->parent ? 'mail.comment_answer' : 'mail.comment';

        return $this->from('Casell@example.com')
                    ->subject("Comments")
                    ->view($page);
    }
}
