<!DOCTYPE html>
<html>
	<head>
		<title>LoL Tourny - Create your own League of Legends tournament</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<!-- Stylesheets -->
		{{ HTML::style('css/bootstrap.min.css') }}
		{{ HTML::style('css/bootstrap-theme.min.css') }}
		{{ HTML::style('css/custom.css') }}
		{{ HTML::style('css/datepicker.css') }}

		<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
		  <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
		<![endif]-->
	</head>
	<body>
		<!-- Header -->
		<div class="container">
			@include('includes.header')
		</div> 
		<!-- Content Area -->
		<div class="container">
			{{ $content }}
		</div>
		<!-- Footer -->
		<div class="container">
			@include('includes.footer')
		</div>
		<!-- Scripts -->
		{{ HTML::script('js/jquery-2.1.0.js') }}
		{{ HTML::script('js/bootstrap.min.js') }}
		{{ HTML::script('js/bootstrap-datepicker.js') }}
		{{ HTML::script('js/custom.js') }}
	</body>
</html>