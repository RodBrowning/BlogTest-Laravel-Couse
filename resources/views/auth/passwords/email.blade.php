@extends('main')

@section('title','Send Reset E-mail')

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-md-6 offset-3 mt-5">
				<div class="card">
					<h3 class="card-header">Email for reset link</h3>
					<div class="card-block p-4">
						@if(session('status'))
							<div class="alert alert-success">
								{{session('status')}}
							</div>
						@endif
				    	{!! Form::open(['url'=>'password/email', 'method'=>'POST'])!!}

				    		{{ Form::label('email', 'Email:')}}
				    		{{ Form::email('email',null,['class'=>'form-control', 'placeholder'=>'Email@here'])}}

				    		{{ Form::submit('Send Link',['class'=>'btn btn-primary btn-block mt-3'])}}				    		
				    	{!! Form::close() !!}
				    	
				 	</div>
				</div>		
			</div>
		</div>
	</div>
@endsection