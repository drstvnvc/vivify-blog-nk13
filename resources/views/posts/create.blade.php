@extends('layouts.app')
@section('title', 'Create a post')

@section('content')
<form action="/posts" method="POST">
  @csrf
  <div class="form-group">
    <label for="title">Title</label>
    <input type="text" 
      class="form-control" 
      id="title"
      aria-describedby="titleHelp"
      placeholder="Enter title"
      name="title">
  </div>
  <div class="form-group">
    <label for="body">Body</label>
    <textarea class="form-control" id="body" rows="5" name="body"></textarea>
  </div>
  <div class="form-check">
    <input type="checkbox" class="form-check-input" id="is_published" name="is_published" value="1">
    <label class="form-check-label" for="is_published">Publish right away</label>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection