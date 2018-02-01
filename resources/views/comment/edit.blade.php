@extends('main')

@section('title',"Edit Comment")

@section('content')
	<div class="col-md-8 offset-md-2">
		<h2 class="mt-5">
			<i class="fas fa-comment"></i>
			Editing {{ucwords($comment->name)}}'s Comment
		</h2>
		<hr>
		<div class="form mt-4">
			{!!Form::model($comment,['route'=>['comment.update',$comment->id],'method'=>'PUT'])!!}
				{{Form::label('name','Name:')}}
				{{Form::text('name',null,['class'=>'form-control','disabled'=>''])}}

				{{Form::label('email','E-mail:',['class'=>'mt-2'])}}
				{{Form::text('email',null,['class'=>'form-control','disabled'=>''])}}

				{{Form::label('comment','Comment:',['class'=>'mt-2'])}}
				{{Form::textArea('comment',null,['class'=>'form-control', 'rows'=>'3'])}}

				{{Form::submit('Save Changes',['class'=>'btn btn-primary btn-block mt-3'])}}
				<a href="{{route('posts.show',$comment->post_id)}}" class="btn btn-outline-secondary btn-block mt-3"><< Black to Post</a>
			{!!Form::close()!!}
		</div>
	</div>
@endsection