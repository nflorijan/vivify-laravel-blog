@extends('layouts.app')

@section('title', $user->name)

@section('content')
    <h2>{{ $user->name }}</h2>
    <ul>
        @foreach ($user->publishedPosts as $post)
    <li><a href="{{ route('post', ['post' => $post->id]) }}">{{ $post->title }}</a></li>
        @endforeach
    </ul>
@endsection


