<?php

namespace Bonjour\Controllers\Auth;

use Illuminate\Routing\Controller;
use Schema\Support\Schema;

class LoginController extends Controller
{
	public function login()
	{
		if (auth()->check()) {
			return view('bonjour::auth.already');
		}

		if (auth()->attempt(request()->only('email', 'password'), request()->has('remember'))) {
			return redirect()->intended(route('bonjour::index'));
		}

		return view('bonjour::auth.login');
	}

	public function logout()
	{
		auth()->logout();

		return redirect()->route('bonjour::auth.login.form');
	}
}