<?php

Route::group(['prefix' => 'admin'], function() {

	Route::group(['middleware' => ['web']], function() {
		Route::get('login', '\Bonjour\Controllers\Auth\LoginController@login')->name('bonjour::auth.login.form');
		Route::post('login', '\Bonjour\Controllers\Auth\LoginController@login')->name('bonjour::auth.login.post');
		Route::any('logout', '\Bonjour\Controllers\Auth\LoginController@logout')->name('bonjour::auth.logout');
	});

	Route::group(['middleware' => ['web', 'role:admin']], function() {
		Route::view('/', 'bonjour::layout')->name('bonjour::index');
	});
});