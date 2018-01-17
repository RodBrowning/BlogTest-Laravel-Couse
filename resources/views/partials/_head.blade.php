<head>
	<meta charset="utf-8">
	@yield('stylesheet')
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
	{!! Html::style('css/pagination.css') !!}
	{!! Html::style('css/estilo_blog_page.css') !!}
	<link href="//fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">
	

	<!--This is a validation css file-->
	@yield('styles')

	<title>Laravel Blog | @yield('title')</title>
</head>