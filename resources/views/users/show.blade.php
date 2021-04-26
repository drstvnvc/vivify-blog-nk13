@extends('layouts.app')

@section('title', $user->name)

@section('content')
<h2>{{$user->name}}</h2>
<ul>
  {{-- $user->publishedPosts ili $user->posts gdje u kontroleru rucno loadujemo posts relaciju --}}
  @foreach ($user->posts as $post)
    <li>
      <a href="{{ route('post', ['post' => $post->id]) }}">{{$post->title}}</a>
    </li>
  @endforeach
</ul>
@endsection
