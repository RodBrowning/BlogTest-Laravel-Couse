@extends('main')

@section('title', $post->title)


@section('content')
		
		<h1>{{ $post->title }}</h1>
		<p>{{ $post->body }}</p>
		<hr>
		<p>Posted in: {{ ucfirst($post->category->name) }}</p>
@endsection