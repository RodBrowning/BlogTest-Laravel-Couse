@extends('main')

@section('title','Tags')


@section('content')
	
	<div class="row">
		<div class="col-md-8">
			<h1>Tags</h1>
			<hr>
			<table class="table table-sm">
				<thead>
					<tr>
						<th>#</th>
						<th>Name</th>
					</tr>	
				</thead>	
				<tbody>
					@foreach($tags as $tag)
						<tr>
							<td>{{$tag->id}}</td>
							<td><a href="{{ route('tag.show',$tag->id) }}">{{ucwords($tag->name)}}</a></td>
						</tr>
					@endforeach				
				</tbody>		
			</table>
		</div>
		<div class="col-md-4">
			<div class="card p-4" style="background-color: #f7f7f9;">
				<h2>New Tag</h2>
				<hr>
				{!! Form::open(['route'=>'tag.store', 'method', 'POST'])!!}
					{{ Form::label('name','Name:',['class'=>' font-weight-bold']) }}
					{{ Form::text('name',null, ['class'=>'form-control']) }}

					{{ Form::submit('Create New Tag',['class'=>'btn btn-primary btn-block mt-3'])}}
				{!! Form::close() !!}
			</div>
		</div>
	</div>

@endsection

