<?php namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class ViewComposerServiceProvider extends ServiceProvider {

	/**
	 * Bootstrap the application services.
	 *
	 * @return void
	 */
	public function boot()
	{
        /**
         * Compose the primary navigation for all public pages
         */
		view()->composer('partials._navbar', function($view){
            $view->with('menu', \App\Menu::find(1));
        });
	}

	/**
	 * Register the application services.
	 *
	 * @return void
	 */
	public function register()
	{
		//
	}

}
