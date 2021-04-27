@extends('layouts.app')

@section('title', $tag->name)

@section('content')
    <h2>{{ $tag->name }}</h2>
    <ul>
        @foreach ($tag->posts as $post)
            <li><a href="{{ route('post', ['post' => $post->id]) }}">{{ $post->title }}</a></li>
        @endforeach
    </ul>
@endsection


