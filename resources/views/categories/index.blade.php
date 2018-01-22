@extends('main')

@section('title', 'Categories')

@section('content')
	<div class="row">
		<div class="col-md-8">
			<h1>Categories</h1>
			<hr>
			<table class="table table-sm">
				<thead>
					<tr>
						<th>#</th>
						<th>Name</th>
					</tr>	
				</thead>	
				<tbody>
					@foreach($categories as $category)
						<tr>
							<td>{{$category->id}}</td>
							<td>{{$category->name}}</td>
						</tr>
					@endforeach				
				</tbody>		
			</table>
		</div>
		<div class="col-md-4">
			<div class="card p-4" style="background-color: #f7f7f9;">
				<h2>New Category</h2>
				<hr>
				{!! Form::open(['route'=>'category.store', 'method', 'POST'])!!}
					{{ Form::label('name','Name:',['class'=>' font-weight-bold']) }}
					{{ Form::text('name',null, ['class'=>'form-control']) }}

					{{ Form::submit('Create New Category',['class'=>'btn btn-primary btn-block mt-3'])}}
				{!! Form::close() !!}
			</div>
		</div>
	</div>
@endsection