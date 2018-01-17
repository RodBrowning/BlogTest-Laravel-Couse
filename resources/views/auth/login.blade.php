@extends('main')

@section('title', 'Login')

@section('content')
		<div class="row">
			<div class="col-md-6 offset-3">
				<h3 class="text-center">Login</h3>
				<hr>
				{!! Form::open() !!}

					{{ Form::label('email', 'E-mail:') }}
					{{ Form::email('email', null,['class' => 'form-control']) }}

					{{ Form::label('password', 'Password:') }}
					{{ Form::password('password', ['class' => 'form-control']) }}

					{{ Form::submit('Submit',['class' => 'btn btn-primary btn-block mt-3']) }}

					<a href="{{url('password/reset')}}" class="mt-3">Forgot Password</a>
				{!! Form::close() !!}
			</div>
		</div>
	
@endsection