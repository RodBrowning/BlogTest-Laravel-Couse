@extends('main')

@section('title','Delete Comment')

@section('stylesheet')
	{{Html::style('css/components/boxes.css')}}
@endsection

@section('content')
	<div class="col-md-8 offset-md-2">
		<h3>Do you really wants to delete {{$comment->name}}'s comment?</h3>
		<hr>
	</div>
	<div class=" col-md-6 offset-md-3 mt-5">
		<div class="pop-box">
			<div class="inner-pop-box">
				<div>
				<label>Name:<p class="ml-2 col">{{ucwords($comment->name)}}</p></label>				
				<label>E-mail:<p class="ml-2 col">{{ucwords($comment->email)}}</p></label>
				<hr class="inner-pop-box-hr">
				</div>
				<div class="mt-3">
				<label>Comment:<p class="mt-3">{{ucwords($comment->comment)}}</p></label>
				</div>
				<div>
					{!!Form::open(['route'=>['comment.destroy',$comment->id],'method'=>'DELETE'])!!}
						{{Form::submit('Delete',['class'=>'btn btn-danger btn-block mt-3'])}}
					{!!Form::close()!!}
					<a href="{{route('posts.show',$comment->post_id)}}" class="btn btn-outline-secondary btn-block mt-3"><< Black to Post</a>
				</div>
			</div>
		</div>
	</div>
@endsection