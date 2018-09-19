@extends('bonjour::auth.layout')

@section('bonjour::auth.content')
	<div class="auth-panel">
		<h3>You area already logged in</h3>
		<p>You may <a href="{{ route('bonjour::auth.logout') }}">logout</a> or go to <a href="{{ route('bonjour::index') }}">home</a>.
	</div>
@endsection