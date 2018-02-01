@extends('main')

@section('title', $post->title)

@section('stylesheet')
	{{Html::style('css/comments.css')}}	
@endsection

@section('content')
		<div class="row">
			<div class="col-md-8 offset-md-2">
				<h1>{{ $post->title }}</h1>
				<p>{{ $post->body }}</p>				
				<p>Posted in: {{ ucfirst($post->category->name) }}</p>
				<hr>
			</div>
		</div>
		<div class="row">
			<div class="col-md-8 offset-md-2">

				<h3 class="mb-4"><i class="fa fa-comment mr-3" aria-hidden="true"></i>{{count($post->comments)}} - {{count($post->comments) > 1 ? ' Comments' : ' Comment'}}</h3>
				@foreach($post->comments as $comment)
				<div class="comment mb-3">					
					<div class="author-info">
						<img class="author-image" src="{{'https://www.gravatar.com/avatar/'.md5(strtolower(trim($comment->email)))."?s=50&d=wavatar"}}">
						<div class="author-name">
							<h4>{{$comment->name}}</h4>
							<p class="author-time">{{date('F nS, Y - g:iA',strtotime($comment->created_at))}}</p>
						</div>
					</div>
					<div class="comment-content">
						{{$comment->comment}}
					</div>
				</div>				
				@endforeach
			</div>			
			
			<br>
		</div>
		<div class="row">
			<div class="col-md-8 offset-md-2">
				<br>
				<h3>Add a new comment</h3>			
				<hr>
				{!!Form::open(['route'=>['comment.store',$post->id],'method'=>'POST'])!!}
				<div class="row">					
					<div class="col-md-6">						
							{{Form::label('name','Name:')}}
							{{Form::text('name',null,['class'=>'form-control'])}}						
					</div>				
					<div class="col-md-6">						
							{{Form::label('email','E-mail:')}}
							{{Form::text('email',null,['class'=>'form-control'])}}						
					</div>
					<div class="col-md-12">
						{{form::label('comment','Comment:')}}
						{{Form::textArea('comment',null,['class'=>'form-control', 'rows'=>'3'])}}

						{{Form::submit('Post Comment',['class'=>'btn btn-primary btn-block mt-3'])}}		
					</div>		
				</div>		
				{!!Form::close()!!}
			</div>
		</div>


@endsection