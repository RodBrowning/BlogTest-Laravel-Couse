@extends('main')

@section('title', 'New User')

@section('content')
		<div class="row">
			<div class="col-md-6 offset-3">
				<h3 class="text-center">Register New User</h3>
				<hr>
				{!! Form::open() !!}					
					{{ Form::label('name', 'Name:') }}
					{{ Form::text('name', null,['class' => 'form-control']) }}

					{{ Form::label('email', 'E-mail:') }}
					{{ Form::email('email', null,['class' => 'form-control']) }}

					{{ Form::label('password', 'Password:') }}
					{{ Form::password('password', ['class' => 'form-control']) }}

					{{ Form::label('password_confirmation', 'Confirm password:') }}
					{{ Form::password('password_confirmation', ['class' => 'form-control']) }}

					{{ Form::submit('Submit',['class' => 'btn btn-primary btn-block mt-3']) }}
				{!! Form::close() !!}
			</div>
		</div>
	

@endsection