<!doctype html>
<html lang="pt-BR">
<head>
	<meta charset="UTF-8">
	<title>
		@section('title')
		Laços
		@show
	</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- CSS are placed here -->
    {{ HTML::style('bootstrap-3.1.1/dist/css/bootstrap.min.css') }}
    {{ HTML::style('bootstrap-3.1.1/dist/css/bootstrap-theme.min.css') }}
    @if(!Sentry::check()){{ HTML::style('bootstrap-3.1.1/dist/css/signin/signin.css') }} @endif
    {{ HTML::style('bootstrap-3.1.1/dist/css/navbar-fixed-top/navbar-fixed-top.css') }}
    {{ HTML::style('bootstrap-3.1.1/css/font-awesome.min.css') }}
    {{ HTML::style('bootstrap-3.1.1/css/ionicons.min.css') }}
    {{ HTML::style('css/padrao.css') }}
</head>
<body>	
	
	@include('layouts.menu')

	<div id="divContent" class="container">
		@yield('content')
	</div>
	<!-- Scripts are placed here -->
    {{ HTML::script('js/jquery/jquery.min.js') }}
    {{ HTML::script('bootstrap-3.1.1/dist/js/bootstrap.min.js') }}
    {{ HTML::script('js/jquery/jquery.blockUI.min.js') }}
    {{ HTML::script('js/jquery/inicializaJquery.js') }}
    @yield('javascript')
</body>
</html>
