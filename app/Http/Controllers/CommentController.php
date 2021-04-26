<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Http\Requests\CreateCommentRequest;
use App\Mail\CommentReceived;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;

class CommentController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth');
  }

  public function store(Post $post, CreateCommentRequest $request)
  {
    $data = $request->validated();

    $comment = $post->comments()->create($data);

    Mail::to($post->author)
      ->send(new CommentReceived($comment, auth()->user()));

    return back();
  }
}
