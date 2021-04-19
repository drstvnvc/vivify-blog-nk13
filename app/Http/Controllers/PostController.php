<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class PostController extends Controller
{
  public function index()
  {
    $posts = Post::published()
      ->orderBy('title')
      ->get();
    return view('posts.index', compact('posts'));
  }

  public function show(Post $post)
  {
    if (!$post->is_published) {
      throw new ModelNotFoundException();
    }
    return view('posts.show', compact('post'));
  }

  public function create()
  {
    return view('posts.create');
  }

  public function store(Request $request)
  {
    // $post = new Post;
    // $post->title = $request->get('title');
    // $post->body = $request->get('body');
    // $post->is_published = $request->get('is_published', false);

    // $post->save();

    $data = $request->validate([
      'title' => 'required|string|max:255|unique:posts',
      'body' =>  ['required', 'string', 'max:1000'], // 'required|string|max:1000',
      'is_published' => 'sometimes'
    ]);

    $newPost = Post::create($data);

    return redirect('/posts');
  }
}
