<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class NewArticlesClass extends Mailable
{
    use Queueable, SerializesModels;

    public $name;
    public $messageText;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($name,$title)
    {
        $this->name = $name;
        $this->messageText = $title;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mail.newArticle')->with([
            'name'=>$this->name,
            'messageText' => 'Автор добавил новую статью'.$this->messageText,
        ])->subject('Новая статья');
    }
}
