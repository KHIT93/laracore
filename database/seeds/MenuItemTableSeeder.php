<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Menu;
use App\MenuItem;

class MenuItemTableSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
            /*
             * Empty menu items table before running seeder.
             */
            DB::table('menu_items')->truncate();
            /**
             * Add default menu items.
             */
            MenuItem::create([
                'mid' => 1,
                'name' => 'Home',
                'link' => 'home',
                'parent' => 0,
                'position' => 0,
                'active' => 1,
            ]);
	    MenuItem::create([
                'mid' => 2,
                'name' => 'Overview',
                'link' => 'admin/dashboard',
                'parent' => 0,
                'position' => -50,
                'active' => 1,
                'icon' => 'tachometer'
            ]);
            MenuItem::create([
                'mid' => 2,
                'name' => 'Content',
                'link' => 'admin/content',
                'parent' => 0,
                'position' => -49,
                'active' => 1,
                'icon' => 'file-o'
            ]);
            MenuItem::create([
                'mid' => 2,
                'name' => 'Layout',
                'link' => 'admin/layout',
                'parent' => 0,
                'position' => -48,
                'active' => 1,
                'icon' => 'desktop'
            ]);
            MenuItem::create([
                'mid' => 2,
                'name' => 'Menus',
                'link' => 'admin/menus',
                'parent' => 4,
                'position' => -50,
                'active' => 1,
                'icon' => 'bars'
            ]);
            MenuItem::create([
                'mid' => 2,
                'name' => 'Blocks',
                'link' => 'admin/blocks',
                'parent' => 4,
                'position' => -50,
                'active' => 1,
                'icon' => 'list-alt'
            ]);
            MenuItem::create([
                'mid' => 2,
                'name' => 'Appearance',
                'link' => 'admin/themes',
                'parent' => 0,
                'position' => -47,
                'active' => 1,
                'icon' => 'paint-brush'
            ]);
            MenuItem::create([
                'mid' => 2,
                'name' => 'Modules',
                'link' => 'admin/modules',
                'parent' => 0,
                'position' => -46,
                'active' => 1,
                'icon' => 'cubes'
            ]);
            MenuItem::create([
                'mid' => 2,
                'name' => 'Users',
                'link' => 'admin/users',
                'parent' => 0,
                'position' => -45,
                'active' => 1,
                'icon' => 'user'
            ]);
            MenuItem::create([
                'mid' => 2,
                'name' => 'Configuration',
                'link' => 'admin/config',
                'parent' => 0,
                'position' => -44,
                'active' => 1,
                'icon' => 'cog'
            ]);
            MenuItem::create([
                'mid' => 2,
                'name' => 'Reports',
                'link' => 'admin/reports',
                'parent' => 0,
                'position' => -43,
                'active' => 1,
                'icon' => 'book'
            ]);
	}

}