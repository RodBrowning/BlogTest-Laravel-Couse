@extends('main')

@section('title', 'Home Page')


@section('content')
		<div class="row">
			<div class="col-md-12">
				<div class="jumbotron">
				  <h1 class="display-3">Wellcome to my blog!</h1>
				  <p class="lead">Thank you so much for visiting.</p>
				  <hr class="my-4">
				  <p>This is my first website built with Laravel. Please read my most popular post!</p>
				  <p class="lead">
				    <a class="btn btn-primary btn-lg" href="#" role="button">Popular Post</a>
				  </p>
				</div>		
			</div>
		</div><!--end of the .row1 -->
		<div class="row">
			<div class="col-md-8">

				@foreach($posts as $post)
					<div class="post" style="margin-bottom: 20px;">
						<h3>{{ $post->title }}</h3>
						<p>{{ strip_tags(substr($post->body, 0, 300)) }}{{strlen( strip_tags($post->body)) > 300 ? '...' : '' }}</p>
						{{ Html::linkRoute('blog.single','Read More',$post->slug,['class'=>'btn btn-primary'])}}
					</div>
					<hr class="my-4">
				@endforeach
				

			</div>
			<div class="col-md-3 offset-1">
				<h2>Side bar</h2>
			</div>
		</div><!--end of the .row2 -->
		
@endsection

