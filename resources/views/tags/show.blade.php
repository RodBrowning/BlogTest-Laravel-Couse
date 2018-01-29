@extends('main')

@section('title',"$tag->name Tag")

@section('content')
	<div class="row">
		<div class="col-md-8">
			<h1>{{ ucwords($tag->name) }} Tag - <small>{!!$count = $tag->posts()->count()!!}{{ $count > 1 ? " Posts" : " Post" }} </small></h1>
		</div>
		<div class="col-md-2">
			<a href="{{ route('tag.edit',$tag->id) }}" class="btn btn-primary btn-block">Editar</a>
		</div>
		<div class="col-md-2">
			{!! Form::open(['route'=>['tag.destroy',$tag->id],'method'=>'DELETE'])!!}
				{{ Form::submit('Deletar',['class'=>'btn btn-danger btn-block'])}}							
			{!! Form::close() !!}			
		</div>
		<div class="col-md-12">
			<hr>
		</div>
	</div>
	<div class="row">
		<div class="col-md-8">
			<table class="table">
				<thead>
					<tr>
						<th>#</th>
						<th>Post</th>
						<th>Related Tags</th>
						<th></th>
					</tr>
				</thead>
				<tbody>
					@foreach($tag->posts as $post)
						<tr>
							<th>{{$post->id}}</th>
							<td>{{$post->title}}</td>
							<td>
								@foreach($post->tags as $tag2)
									<span class="badge badge-dark">{{$tag2->name}}</span>
								@endforeach
							</td>
							<td><a href="{{ route('posts.show',$post->id) }}" class="btn btn-secondary btn-sm">View</a></td>
						</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
@endsection