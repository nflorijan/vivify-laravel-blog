@extends('layouts.app')

@section('title', $post->title)

@section('content')
  <h2>{{ $post->title }}</h2>
  <p>{{ $post->body }}</p>
  <h4>Comments:</h4>
  <ul>
    @forelse ($post->comments as $comment)
      <li>{{ $comment->body}}</li>
      @empty
      <span>No Comments</span>
    @endforelse
  </ul>
@endsection
