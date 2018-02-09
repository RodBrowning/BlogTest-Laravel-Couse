
@extends('main')

@section('title', 'Edit Post')

@section('styles')
	
	{!! Html::style('css/parselyjs.css')!!}	
	{!! Html::style('css/chosen.css') !!}
	
	<script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
  	<script>tinymce.init({ selector:'textarea', menubar: false, plugins: 'code' });</script>

@endsection

@section('content')
	
		{!! Form::model($post, ['route' => ['posts.update', $post->id], 'method'=>'put',  'data-parsley-validate'=>'' ]) !!}
	<div class="row">
	
		<div class="col-md-6 offset-1">
			{{ Form::label('title', 'Title:')}}
			{{ Form::text('title', null, array('class'=>'form-control', 'required' =>'', 'maxlength'=>'255'))}}

			{{ Form::label('slug', 'Slug:',['class'=>'mt-2']) }}
			{{ Form::text('slug', null, array('class' => 'form-control', 'required' => '', 'maxlength' =>'255', 'minlength'=>'6')) }}

			{{ Form::label('category_id','Select Category:',['class'=>'mt-2'])}}
			{{ Form::select('category_id', $categories, $post->catedory_id,['class'=>'form-control '])}}

			{{ Form::label('tags','Select tags:',['class'=>'mt-2'])}}
			{{ Form::select('tags[]',$tags, null,['class'=>'form-control multi-box', 'multiple'=>'multiple'])}}
			
			{{ Form::label('body', 'Body:', ['class'=>'mt-2'])}}
			{{ Form::textarea('body', null, ['class'=>'form-control', 'required'=>''])}}
			
		</div>
		<div class="col-md-5">
			<div class="card bg-light p-3">
				
				<dl class="row">
					<dt class="col-md-6 text-right">Create at:</dt>
					<dd class="col-md-6">{{ date('M j Y H:i', strtotime($post->created_at))}}</dd>
				</dl>
			
				<dl class="row">
					<dt class="col-md-6 text-right">Last Updated:</dt>
					<dd class="col-md-6" ">{{ date('M j Y H:i',strtotime($post->updated_at)) }}</dd>
				</dl>
				<hr>
				<div class="row">
					<div class="col-md-6">	
						{{ Html::linkRoute('posts.show', 'Cancel', array($post->id), array('class' => 'btn btn-danger btn-block'))}}											
					</div>
					<div class="col-md-6">
						{{ form::submit('Save Changes',  array('class' => 'btn btn-success btn-block'))}}
						
					</div>
				</div>				
			</div>
		</div>
		
	</div>
	{!! Form::close()!!}<!--The end of the form-->

@stop

@section('scripts')
	
	{!! Html::script('js/parselyjs.js') !!}
	{!! Html::script('js/i18n/pt-br.js') !!}

	{!! Html::script('js/chosen.jquery.js')!!}

	<script type="text/javascript">
		$('.multi-box').chosen().val({!! json_encode($post->tags()->getRelatedIds()) !!}).trigger('chosen:updated');
		
	</script>
@endsection