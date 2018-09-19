<!doctype html>
<html lang="en" class="h-100">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    
    <title>{{ config('APP_NAME') }}</title>

    <link type="text/css" rel="stylesheet" href="/vendor/pzkpde/bonjour/vendor/twitter/bootstrap/css/bootstrap.min.css" />
    <link type="text/css" rel="stylesheet" href="/vendor/pzkpde/bonjour/css/styles.css" />

    @yield('bonjour::styles')
</head>
<body>
	<div class="container-fluid bonjour-container">
		<div class="row bonjour-wrapper">
			<div class="col-lg-2 col-md-3 col-sm-4 col-xs-4 bonjour-navigation">
				<ul class="nav flex-column">
   				@yield('bonjour::navigation')
				  <li class="nav-item">
				  	<a class="nav-link" href="{{ route('bonjour::auth.logout') }}">Logout</a>
				  </li>
				</ul>
			</div>
			<div class="col-lg-10 col-md-9 col-sm-8 col-xs-8 bonjour-content">
				@yield('bonjour::content')
			</div>
		</div>
	</div>

	@yield('bonjour::scripts')
</body>