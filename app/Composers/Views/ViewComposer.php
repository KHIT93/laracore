<?php namespace App\Composers\Views;


use Illuminate\Contracts\View\View;

interface ViewComposer
{
    public function compose(View $view);
}