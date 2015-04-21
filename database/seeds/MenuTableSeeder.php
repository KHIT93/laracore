<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Menu;

class MenuTableSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
            /*
             * Empty menus table before running seeder.
             */
            DB::table('menus')->truncate();
            /**
             * Add default menus.
             */
	    Menu::create(['name' => 'Main Menu', 'description' => 'Primary site navigation']);
            Menu::create(['name' => 'Management', 'description' => 'Primary administration navigation']);
	}

}