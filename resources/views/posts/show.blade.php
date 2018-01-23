@extends('main')

@section('title','View Post')

@section('content')
	<div class="row">
		<div class="col-md-6 offset-1">
			<h1>{{$post->title}}</h1>			
			<p class="lead">{{$post->body}}</p>
		</div>
		<div class="col-md-5">
			<div class="card bg-light p-4">
				<dl>
					<dt>URL:</dt>
					<dd><a href="{{ route("blog.single",$post->slug) }}">{{ url("blog/".$post->slug) }}</a></dd>
					<ul class="list-inline mt-3">
						<li class="list-inline-item"><strong>Category:</strong></li>
						<li class="list-inline-item">{{$post->category->name}}</li>
					</ul>
				</dl>
				<div class="row ">
					<dl class="col-md-6">
						<dt>Create at:</dt>
						<dd>{{ date('M j Y H:i', strtotime($post->created_at))}}</dd>
					</dl>
				
					<dl class="col-md-6">
						<dt>Last Updated:</dt>
						<dd>{{ date('M j Y H:i',strtotime($post->updated_at)) }}</dd>
					</dl>
				</div>
				<hr>
				<div class="row">
					<div class="col-md-6">	
						{{ Html::linkRoute('posts.edit', 'Update', array($post->id), array('class' => 'btn btn-primary btn-block'))}}											
					</div>
					<div class="col-md-6">
						
						{!! Form::open(['route' => ['posts.destroy', $post->id], 'method' => 'DELETE']) !!}
							{{ form::submit('Delete',['class' => 'btn btn-danger btn-block']) }}
						{!! Form::close() !!}
						
					</div>
					<div class="col-md-12">
						{{ Html::linkRoute('posts.index', '<< See All Posts', [], ['class' => 'btn btn-outline-secondary btn-block mt-3'])}}
					</div>
				</div>				
			</div>
		</div>
	</div>
@endsection