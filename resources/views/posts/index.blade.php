@extends('main')

@section('title', 'All Posts')

@section('content')
	<div class="row">
		<div class="col-md-10">
			<h1>All Posts</h1>
		</div>
		<div class="col-md-2">
			<a href="{{ route('posts.create') }}" class="btn btn-primary btn-block">Create New Post</a>
		</div>
		<div class="col-md-12">
			<hr>
		</div>		
		<div class="col-md-12">
			<table class="table">
				<tr>
					<th>#</th>
					<th>Title</th>
					<th>Body</th>
					<th>Slug</th>
					<th>Created at</th>
					<th></th>
				</tr>
				<tbody>
				@foreach($posts as $post)
					<tr>
						<td class="align-middle">{{$post->id}}</td>
						<td class="align-middle">{{substr($post->title, 0, 30)}}{{ strlen($post->title) > 30 ? "...": "" }}</td>
						<td class="align-middle">{{strip_tags(substr($post->body, 0, 50))}}{{ strip_tags(strlen($post->body)) > 50 ? "...": "" }}</td>
						<td class="align-middle">{{substr($post->slug, 0 , 10)}}{{ strlen($post->slug) > 10 ? "..." : ""}}</td>
						<td class="align-middle">{{date('M j, Y', strtotime($post->created_at))}}</td>
						<td class="align-middle">
							<a href="{{ route('posts.show', $post->id) }}" class="btn btn-outline-secondary btn-sm">View</a> <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-outline-secondary btn-sm">Edit</a>
						</td>
					</tr>
				@endforeach
				</tbody>
			</table>
			
			<div class="center-pagination ">
				{!! $posts->links(); !!}
				
			</div>
		

		</div>
	</div>
		



@stop