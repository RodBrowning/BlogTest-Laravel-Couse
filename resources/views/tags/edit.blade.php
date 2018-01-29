@extends('main')

@section('title', "Edit $tag->name Tag")

@section('content')
		<div class="row">
			<div class="col-md-6 offset-md-3">
				<h1>Edit Tag</h1>
				<hr>
			</div>			
		</div>
		<div class="row">
			<div class="col-md-6 offset-md-3">
				{!! Form::open( ['route'=>['tag.update',$tag->id],'method'=>'PUT']) !!}
					{{ Form::label('name', 'Tag name:') }}
					{{ Form::text('name',ucwords($tag->name),['class'=>'form-control']) }}

					{{ Form::submit('Save Changes',['class'=>'btn btn-success mt-3']) }}
				{!! Form::close() !!}
			</div>
		</div>
@endsection