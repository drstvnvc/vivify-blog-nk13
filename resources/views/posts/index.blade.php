@extends('layouts.app')

@section('title', 'Vivify Blog')


@section('content')
<h2>Posts</h2>
<ul>
  @foreach ($posts as $post)
    {{-- <li><a href="/posts/{{$post->id}}">{{$post->title}}</a></li> --}}
    <li>
      <a href="{{ route('post', ['post' => $post->id]) }}">{{$post->title}} ({{$post->comments->count()}})</a>
      @foreach ($post->tags as $tag)
        <a href="{{ route('tag', ['tag' => $tag]) }}" class="badge bg-secondary">{{$tag->name}}</a>
      @endforeach
    </li>
  @endforeach
</ul>
<div>{{ $posts->links() }}</div>

<style>
  svg {
      width: 20px;
  }
</style>

@endsection