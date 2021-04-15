<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
  public function index()
  {
    $posts = Post::all(); // DB::table('posts')->get();
    return view('posts', compact('posts'));
  }

  public function show($id)
  {
    $post = Post::findOrFail($id);
    return view('post', compact('post'));
  }
}
