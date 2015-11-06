<?php


namespace App\Composers\Views;


use App\Libraries\Page;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Schema;
use App\Models\Setting;
use App\Libraries\Theme;
use App\Models\Block;

class PageViewComposer implements ViewComposer
{
    public function compose(View $view)
    {
        if(Schema::hasTable('settings'))
        {
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
                ->with('primary_nav', view(Theme::template('primary_navigation'), ['menu' => \App\Models\Menu::find(1)]))
                ->with('secondary_nav', view(Theme::template('secondary_navigation')))
                ->with('breadcrumb', '')
                ->with('title', $page->getTitle())
                ->with('metadata', $page->metadata);
        }
    }
}