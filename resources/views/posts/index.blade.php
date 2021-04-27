@extends('layouts.app')

@section('title', 'Vivify Blog')

@section('content')
  <h2>Posts</h2>
  <ul class="list-group list-group-flush">
    @foreach ($posts as $post)
      <li class="list-group-item">
        <a href="{{ route('post', ['post' => $post->id]) }}">{{ $post->title }} ({{ $post->comments->count() }})</a>
        <p>{{ Str::limit($post->body, 80, '...') }}</p>
        @foreach ($post->tags as $tag)
            <a class="badge btn-secondary" href="{{ route('tag', ['tag' => $tag]) }}">{{ $tag->name}}</a>
        @endforeach
      </li>
    @endforeach
  </ul>
  <div>
    {{ $posts->links() }}
  </div>
@endsection
<style>
  svg {
    width: 20px;
  }
</style>
