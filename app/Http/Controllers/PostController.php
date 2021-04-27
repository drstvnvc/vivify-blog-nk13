<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Comment;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\CreatePostRequest;
use App\Models\User;

class PostController extends Controller
{
  public function index()
  {
    DB::listen(function ($query) { // callback which is called for each query executed in this method
      info($query->sql); // print sql into storage/logs/laravel.log file
    });
    $posts = Post::published()
      ->with('comments')
      ->orderBy('title')
      ->paginate(15);
    return view('posts.index', compact('posts'));
  }

  public function show(Post $post)
  {

    if (!$post->is_published) {
      throw new ModelNotFoundException();
    }
    // $comments = Comment::where('post_id', $post->id)->get();

    return view('posts.show', compact('post'));
  }

  public function create()
  {
    return view('posts.create');
  }

  public function store(CreatePostRequest $request)
  {
    // $post = new Post;
    // $post->title = $request->get('title');
    // $post->body = $request->get('body');
    // $post->is_published = $request->get('is_published', false);

    // $post->save();

    $data = $request->validated();
    $newPost = auth()->user()->posts()->create($data);

    $request->session()
      ->flash('status_message', 'You have successfully created a post');
    return redirect('/posts');
  }
}
