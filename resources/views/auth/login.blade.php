@extends('bonjour::auth.layout')

@section('bonjour::auth.content')
	<form method="post" class="auth-panel">
		@csrf
		<div class="form-group">
			<label for="email">E-mail:</label>
			<input type="text" id="email" name="email" class="form-control" value="{{ request('email') }}" {{ request('email') ? '' : 'autofocus' }} />
		</div>
		<div class="form-group">
			<label for="password">Password:</label>
			<input type="password" id="password" name="password" class="form-control" {{ request('email') ? 'autofocus' : '' }} />
		</div>
		<div class="form-check">
			<input type="checkbox" class="form-check-input" id="remember" name="remember" {{ request('remember') ? 'checked="checked"' : '' }}>
			<label class="form-check-label" for="remember">Remember me</label>
		</div>
		<div class="form-group">
			<button type="submit" class="btn btn-primary">Log in</button>
		</div>
	</form>
@endsection