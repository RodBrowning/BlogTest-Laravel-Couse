@extends('main')

@section('title','Create New Post')

@section('styles')
	
	{!! Html::style('css/parselyjs.css')!!}
    {!! Html::style('css/chosen.css') !!}

@endsection

@section('content')
	
	<div class="col-md-8 offset-2">
		<h1>Create New Post</h1>
		<hr>

		{!! Form::open(['route' => 'posts.store', 'data-parsley-validate' => '']) !!}
    		
    		{{ Form::label('title','Title:')}}
    		{{ Form::text('title', null, array('class'=>'form-control', 'placeholder'=>"Place the post's title here.", 'required'=> '', 'maxlength'=>'255', 'autofocus'=>''))}}

    		{{ Form::label('slug', 'Slug:', array('class' => 'mt-1')) }}
    		{{ Form::text('slug', null, array('class' => 'form-control', 'placeholder' => 'Set your slug\'s page here.', 'required' => '', 'minlength'=>"5", 'maxlength'=>"255")) }}

    		{{ Form::label('category_id','Select category:',['class'=>'mt-1'])}}
    		<select name='category_id' class="form-control" required>
    			@foreach($categories as $category)
    				<option value="{{$category->id}}">{{ucwords($category->name)}}</option>
    			@endforeach
    		</select>

            {{ Form::label('tags[]','Select tags:',['class'=>'mt-1'])}}
            <select name='tags[]' class="form-control mult-box" required multiple>
                @foreach($tags as $tag)
                    <option value="{{$tag->id}}">{{ucwords($tag->name)}}</option>
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

    {!! Html::script('js/chosen.jquery.js') !!}
    

    <script type="text/javascript">
        $('.mult-box').chosen();
    </script>    

@endsection