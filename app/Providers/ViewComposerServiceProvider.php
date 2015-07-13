<?php namespace App\Providers;

use App\Block;
use App\Libraries\Page;
use App\Setting;
use App\Libraries\Theme;
use Illuminate\Http\Response;
use Illuminate\Support\ServiceProvider;
use Symfony\Component\HttpFoundation\Request;

class ViewComposerServiceProvider extends ServiceProvider
{

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
        view()->composer('partials._navbar', function ($view) {
            $view->with('menu', \App\Menu::find(1));
        });

        view()->composer(Theme::template('page'), function ($view) {
            $page = Page::init();
            foreach (Theme::sections() as $key => $value) {
                if (count(Block::whereSection($key)->get())) {
                    $page->{$key} = Theme::renderSection($key);
                } else {
                    $page->{$key} = false;
                }
            }


            $view->with('page', $page)
                ->with('logo', Setting::get('site_logo'))
                ->with('site_home', '/')
                ->with('site_name', Setting::get('site_name'))
                ->with('site_slogan', Setting::get('site_slogan'))
                ->with('primary_nav', view(Theme::template('primary_navigation'), ['menu' => \App\Menu::find(1)]))
                ->with('secondary_nav', view(Theme::template('secondary_navigation')))
                ->with('breadcrumb', '')
                ->with('title', $page->getTitle())
                ->with('metadata', ((isset($page->metadata)) ? $page->metadata : ''))
                ->with('status', $page->getTitle());
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
