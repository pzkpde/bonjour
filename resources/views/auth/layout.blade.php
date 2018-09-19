<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    
    <title>{{ config('APP_NAME') }}</title>

    <link type="text/css" rel="stylesheet" href="/vendor/pzkpde/bonjour/vendor/twitter/bootstrap/css/bootstrap.min.css" />
    <link type="text/css" rel="stylesheet" href="/vendor/pzkpde/bonjour/css/styles.css" />
    <link type="text/css" rel="stylesheet" href="/vendor/pzkpde/bonjour/css/auth.css" />

    @yield('bonjour::auth.styles')
    <style>
        .auth-panel {
            width: 100%;
            max-width: 300px;
            margin: auto;
            transform: translateY(100%);
        }
    </style>
</head>
<body>
    <div class="center-screen">
	   @yield('bonjour::auth.content')
    </div>
	@yield('bonjour::auth.scripts')
</body>