@extends('main')

@section('title', $post->title)


@section('content')
		
		<h1>{{ $post->title }}</h1>
		<p>{{ $post->body }}</p>
		<hr>
		<p>Posted in: {{ isset($post->category->name) ? $post->category->name : 'Sem categoria' }}</p>
@endsection