@extends('layouts.app')

@section('title', 'Create a Post')

@section('content')
    <h2>Add post</h2>
    <form action="/posts" method="POST">
      @csrf
      <div class="form-group">
        <label for="post-title">Post title</label>
        <input name="title" id="post-title" type="title" class="form-control" placeholder="Enter email">
      </div>
      <div class="form-group">
        <label for="post-content">Post content</label>
        <textarea name="body" id="post-content" class="form-control" rows="5" placeholder="Post content"></textarea>
      </div>
      <div class="form-check">
        <input name="is_published"  id="is_published" type="checkbox" class="form-check-input" value="1">
        <label for="is_published" class="form-check-label">Publish post</label>
      </div>
      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection


