<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Http\Requests\CreateCommentRequest;
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

    $post->comments()->create($data);

    return back();
  }
}
