@extends('main')

@section('title','Create New Post')

@section('styles')
	
	{!! Html::style('css/parselyjs.css')!!}

@endsection

@section('content')
	
	<div class="col-md-8 offset-2">
		<h1>Create New Post</h1>
		<hr>

		{!! Form::open(['route' => 'posts.store', 'data-parsley-validate' => '']) !!}
    		
    		{{ Form::label('title','Title:')}}
    		{{ Form::text('title', null, array('class'=>'form-control', 'placeholder'=>"Place the post's title here.", 'required'=> '', 'maxlength'=>'255'))}}

    		{{ Form::label('slug', 'Slug:', array('class' => 'mt-1')) }}
    		{{ Form::text('slug', null, array('class' => 'form-control', 'placeholder' => 'Set your slug\'s page here.', 'required' => '', 'minlength'=>"5", 'maxlength'=>"255")) }}

    		{{ Form::label('category_id','Select category:',['class'=>'mt-1'])}}
    		<select name='category_id' class="form-control">
    			@foreach($categories as $category)
    				<option value="{{$category->id}}">{{$category->name}}</option>
    			@endforeach
    		</select>

    		{{ Form::label('body', 'Post Body:', array('class' => 'mt-1'))}}
    		{{ Form::textarea('body', null, array('class' => 'form-control', 'placeholder'=>"Place the post's content here.", 'required' =>''))}}

    		{{ Form::submit('Create Post', array('class'=>'btn btn-success btn-lg btn-block',     'style'=>'margin-top:20px;'))}}

		{!! Form::close() !!}

	</div>
@endsection


@section('scripts')
	
	{!! Html::script('js/parselyjs.js') !!}
	{!! Html::script('js/i18n/pt-br.js') !!}


@endsection