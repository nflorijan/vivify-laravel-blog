<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\Comment;
use App\Models\User;

class CommentReceived extends Mailable
{
    use Queueable, SerializesModels;

    private $comment;
    private $commentAuthor;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Comment $comment, User $commentAuthor)
    {
        $this->comment = $comment;
        $this->commentAuthor = $commentAuthor;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.test')
                    ->subject('Test email')
                    ->with([
                        'commentAuthor' => $this->commentAuthor->name,
                        'comment' => $this->comment->body,
                        'postTitle' => $this->comment->post->title
                    ]);
    }
}
