<?php namespace App\Providers;

use App\Libraries\Theme;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        try
        {
            $db = \DB::connection()->getDatabaseName();
            if(Schema::hasTable('settings'))
            {
                View::composer(Theme::template('page'), 'App\Composers\Views\PageViewComposer');
            }
        }
        catch(\PDOException $ex)
        {

        }
        View::composer(['installer.site', 'installer'], 'App\Composers\Views\InstallerViewComposer');
    }

    /**
     * Register any application services.
     *
     * This service provider is a great spot to register your various container
     * bindings with the application. As you can see, we are registering our
     * "Registrar" implementation here. You can add your own bindings too!
     *
     * @return void
     */
    public function register()
    {
        //
    }

}
