@extends('main')

@section('title','Blog')

@section('content')
	
	<div class="row">
		<div class="col-md-8 offset-2">
			<h1>Blog</h1>
			<hr>
		</div>
	</div>
	<!--Ganbiarra para traduzir data para portugues-->
	<?php //setlocale(LC_TIME, 'pt-BR' ,'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese'); 

	?>
		@foreach($posts as $post)
		<div class="row">
			<div class="col-md-8 offset-2">
				<h2>{{ $post->title }}</h2>
				<p>{{ substr($post->body, 0, 250) }}{{ strlen($post->body) > 250 ? '...':'' }}</p>
				<!-- Date on the right -->
				<div class="col-md-6 offset-6">
					<p class="text-right">
						<span class="primary-date">
							<!-- |strtotime 	 = Pass the string date to timestamp..
								 |strftime  	 = Format the date with translate possibility.
								 |utfirst   	 = Change first charcter to upper case.
								 |utf8_encode = Able especial charcters to show as 'ç or é'.
							 -->
							{{ utf8_encode(ucfirst(strftime('%A  - %d/%b/%Y %T', strtotime($post->created_at)))) }}
						</span>
					</p>
					<hr class="primary-line">
				</div>
				<a class="btn btn-primary" href="{{ route('blog.single',$post->slug) }}">Read More</a>
				<hr>
			</div>			
		</div>	
	@endforeach
	<div class="center-pagination">
		{!! $posts->links() !!}
	</div>
@endsection