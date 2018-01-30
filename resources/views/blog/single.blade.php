@extends('main')

@section('title', $post->title)


@section('content')
		<div class="row">
			<div class="col-md-8 offset-md-2">
				<h1>{{ $post->title }}</h1>
				<p>{{ $post->body }}</p>
				<hr>
				<p>Posted in: {{ ucfirst($post->category->name) }}</p>		
				<hr>
			</div>
		</div>
		<div class="row">
			<div class="col-md-6 offset-md-2">
				@if(count($post->comments) > 0)
					<h3 class="mb-4">{{count($post->comments)}} Comments</h3>
					@foreach($post->comments as $comment)
						<div class="comment">
							<div class="author-info mb-4">
								<img src="{{"https://www.gravatar.com/avatar/" . md5( strtolower( trim( $comment->email ) ) )."?d=robohash&s=50"}}">
								<div class="author-name">
									<h4>Name: {{$comment->name}}</h4>
									<p class="author-time">Created at: <b>{{strftime('%d/%B/%G',strtotime($comment->created_at))}}</b></p>
								</div>
								<div class="comment-content	">
									<p>{{$comment->comment}}</p>
								</div>
							</div>
						</div>
					@endforeach
				@endif
			</div>
		</div>
		<div class="row">
			<div class="col-md-8 offset-md-2">
				{!!Form::open(['route'=>['comment.store',$post->id],'method'=>'POST'])!!}
					<div class="row">
						<div class="col-md-6">
							{{Form::label('name','Name:')}}
							{{Form::text('name',null,['class'=>'form-control'])}}
						</div>
						
						<div class="col-md-6">
							{{Form::label('email','E-mail:')}}
							{{Form::email('email',null,['class'=>'form-control'])}}	
						</div>		
					</div>

					{{Form::label('comment','Comment:')}}
					{{Form::textArea('comment',null,['class'=>'form-control', 'rows'=>'3'])}}
					{{Form::submit('Post Comment',['class'=>'btn btn-primary btn-block mt-3'])}}
				{!!Form::close()!!}
			</div>
		</div>
		

@endsection