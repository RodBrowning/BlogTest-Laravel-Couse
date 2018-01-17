<!DOCTYPE html>
<html lang="pt-br">

<!--Located in partials folder
	Adds all the head tag content-->
@include('partials._head') 


<body>
	
	<!--Located in partials folder 
		This is the top navbar-->
	@include('partials._navbar') 


	<!-- This is the main container-->
	<div class="container" style="margin-top: 20px;">

			
			@include('partials._messages')
			<!-- Here goes the main Article content-->
			@yield('content') 
		

	</div><!--end of .container-->
	
	<!--Located in partials folder
		Footer of the page-->
	@include('partials._footer') 

	<!--Located in partials folder
		Adds all the JavaScript Links-->
	@include('partials._javascript') 

		<!--Add a particular JavaScript code just for each page-->
		@yield('scripts') 

</body>
</html>