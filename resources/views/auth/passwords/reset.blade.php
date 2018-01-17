@extends('main')

@section('title','Reset Password')

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-md-6 offset-3 mt-5">
				<div class="card">
					<h3 class="card-header">Reset Password</h3>
					<div class="card-block p-4">
				    	{!! Form::open(['url'=>'password/reset', 'method'=>'POST'])!!}
				    		
				    		{{ Form::hidden('token', $token)}}

				    		{{ Form::label('email', 'Email:')}}
				    		{{ Form::email('email', $email,['class'=>'form-control',])}}

				    		{{ Form::label('password','Password:')}}
				    		{{ Form::password('password', ['class'=>'form-control'])}}

				    		{{ Form::label('password_confirmation', 'Repeat Password:') }}
				    		{{ Form::password('password_confirmation',['class'=>'form-control']) }}

				    		{{ Form::submit('Send Link',['class'=>'btn btn-primary btn-block mt-3'])}}				    		
				    	{!! Form::close() !!}
				    	
				 	</div>
				</div>		
			</div>
		</div>
	</div>
@endsection