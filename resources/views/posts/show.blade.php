@extends('layouts.app')

@section('title', $post->title)

@section('content')
  <h2>{{ $post->title }}</h2>
  <span>Author: {{ $post->user->name }}</span>
  <hr/>
  <p>{{ $post->body }}</p>
  <h4>Comments:</h4>
  <ul>
    @forelse ($post->comments as $comment)
      <li>{{ $comment->body}}</li>
      @empty
      <span>No Comments</span>
    @endforelse
  </ul>

  <form action="/posts/{{ $post->id }}/comments" method="POST">
    @csrf
    <div class="form-group">
      <label for="post-content">Add Comment</label>
      <textarea 
        name="body" 
        id="post-content" 
        class="form-control  
        @error('body')is-invalid @enderror" 
        rows="2" 
        placeholder="Post content"></textarea>
      @error('body')
        <div class="alert alert-danger">{{ $message }}</div>
      @enderror
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>

@endsection
