<!DOCTYPE html>
<html lang="es_ES">
	<head>

		<title>
		@yield('titulo', 'Plataforma ANIMUM Live Online')
		</title>

		<link href="{{ asset('resources/img/favicon.ico') }}" rel="shortcut icon">

		<!--Metas-->
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="description" content="@yield('meta-description')">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="base_url" content="{{ URL::to('/') }}">
		<meta name="csrf-token" content="{{ csrf_token() }}">

		<!-- CSS styles -->
		<!-- Bootstrap core CSS -->
    	{!! Html::style('components/bootstrap-3.1.1/css/bootstrap.min.css', array('media' => 'screen')) !!}

		<!-- Animum template -->
    	{!! Html::style('resources/css/animum.css', array('media' => 'screen')) !!}

		<!-- Custom template -->
		@yield('styles')

		<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
		  <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
		<![endif]-->

	</head>

	<body>

		<!--[if lt IE 7]>
		<p class="chromeframe">You are using an outdated browser. <a href="http://browsehappy.com/">Upgrade your browser today</a> or <a href="http://www.google.com/chromeframe/?redirect=true">install Google Chrome Frame</a> to better experience this site.</p>
		<![endif]-->

		<!-- Wrap -->
		<section class="base">

			{{-- Sidebar --}}
			@include('Partials/sidebar')

			<!-- Page -->
			<main class="page">

				<!-- Header Navigation -->
				<header class="page__navbar container-fluid clearfix">
					@include('Partials/header')
				</header>				

				<!-- Page Header-->
				<div class="page__header container-fluid clearfix">
					<h1>
						@yield('header', '')<br>
						<small>@yield('subheader', '')</small>
					</h1>
				</div>

				{!! Breadcrumbs::render() !!}

				<!-- alerts -->
				<div class="alerts container-fluid clearfix">
					@include('Partials/alerts')
				</div>

			  	<!-- Page Content -->
				<div class="page__content container-fluid clearfix">

					<div class="row row4">

						<!-- Contents -->
						<div class="contents-zone">
							@yield('contents')
						</div>
						
					</div>
					        
				</div>

			</main>

		</section>

		<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
		{!! Html::script('components/jquery-1.11.0.min.js') !!}

		<!-- Include all compiled plugins (below), or include individual files as needed -->
		{!! Html::script('components/bootstrap-3.1.1/js/bootstrap.min.js') !!}

		<!-- Custom Script -->
		<script type="text/javascript">
		@yield('script')
		</script>

	</body>

</html>