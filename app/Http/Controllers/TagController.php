<?php

namespace App\Http\Controllers;

use App\Models\Tag;

class TagController extends Controller
{
  //
  public function show(Tag $tag)
  {
    $tag->load(['posts' => function ($qb) {
      return $qb->where('is_published', 1);
    }]);
    return view('tags.show', compact('tag'));
  }
}
