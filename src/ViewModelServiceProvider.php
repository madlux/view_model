<?php

namespace Madlux\ViewModel;

use Illuminate\Support\ServiceProvider;

class ViewModelServiceProvider extends ServiceProvider
{
	
	public function register()
	{
		/*
		App::bind('MyFilter', function ($app) {
			return new App\Http\MyFilter;
		});
		*/
	}
	
	public function boot()
	{
		$this->loadViewsFrom(__DIR__.'/views', 'view_model');
		/*
		$this->publishes([
			__DIR__.'config/settings.php' => config_path('settings.php'),
		]);
		*/
	}
}
