@extends('layouts.app')

@section('title', 'Posts with ' . $tag->name . ' tag')

@section('content')
<h2>Posts with {{$tag->name}} tag</h2>
<ul>
  @foreach ($tag->posts as $post)
    <li>
      <a href="{{ route('post', ['post' => $post->id]) }}">{{$post->title}}</a>
    </li>
  @endforeach
</ul>
@endsection
