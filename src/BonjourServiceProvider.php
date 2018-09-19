<?php

namespace Bonjour;

use Illuminate\Support\ServiceProvider;

class BonjourServiceProvider extends ServiceProvider
{
    public function register()
    {
		config([
			// Override default user model class (for Auth service)
			'auth.providers.users.model' => \Bonjour\Models\User::class,
		]);
    }

    public function boot()
    {
		$this->loadMigrationsFrom(__DIR__ . '/../database/migrations');
		$this->loadRoutesFrom(__DIR__.'/../routes/web.php');
		$this->loadViewsFrom(__DIR__ . '/../resources/views', 'bonjour');

		// Init middlewares
		$this->app->router->aliasMiddleware('permission', PermissionMiddleware::class);
				$this->app->router->aliasMiddleware('role', RoleMiddleware::class);

		$this->publishes([
			__DIR__.'/../publishable' => public_path('vendor/pzkpde/bonjour'),
		], 'public');
    }
}