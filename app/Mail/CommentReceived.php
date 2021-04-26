<?php

namespace App\Mail;

use App\Models\Comment;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

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
    return $this->subject('Comment recieved')
      ->view('emails.comment-received')
      ->with([
        'commentAuthor' => $this->commentAuthor->name,
        'comment' => $this->comment->body,
        'postTitle' => $this->comment->post->title
      ]);
  }
}
