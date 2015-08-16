<?php
namespace Modules\Wiki\Providers;

use App;
use Config;
use Lang;
use View;
use Illuminate\Support\ServiceProvider;

class WikiServiceProvider extends ServiceProvider
{
	/**
	 * Register the Wiki module service provider.
	 *
	 * @return void
	 */
	public function register()
	{
		// This service provider is a convenient place to register your modules
		// services in the IoC container. If you wish, you may make additional
		// methods or service providers to keep the code more focused and granular.
		App::register('Modules\Wiki\Providers\RouteServiceProvider');

		$this->registerNamespaces();
	}

	/**
	 * Register the Wiki module resource namespaces.
	 *
	 * @return void
	 */
	protected function registerNamespaces()
	{
		Lang::addNamespace('wiki', realpath(__DIR__.'/../Resources/Lang'));

		View::addNamespace('wiki', realpath(__DIR__.'/../Resources/Views'));
	}
}
