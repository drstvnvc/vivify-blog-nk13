@extends('layouts.app')

@section('title', $post->title)

@section('content')
<h2>{{$post->title}}</h2>
<div>Author: {{ $post->author->name }} </div>
<div>Number of posts of this author: {{ $post->author->posts->count() }}</div>
<hr />
<p>{{$post->body}}</p>
<h5>Comments</h5>
<ul>
  @forelse($post->comments as $comment)
    <li>{{$comment->body}}</li>
  @empty
    <span>No comments</span>
  @endforelse
</ul>
<form action="{{route('createComment', ['post' => $post])}}" method="POST">
  @csrf
  {{-- <input type="hidden" name="post_id" value="{{$post->id}}" /> --}}
  <div class="form-group">
    <label for="body">Add comment:</label>
    <textarea
      class="form-control @error('body') is-invalid @enderror"
      id="body"
      rows="2"
      name="body"
    ></textarea>
    @error('body')
      <div class="alert alert-danger">{{$message}}</div>
    @enderror
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection
