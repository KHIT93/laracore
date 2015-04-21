<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Role;

class RoleTableSeeder extends Seeder {

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
            DB::table('roles')->delete();
            /**
             * Add default Roles.
             */
	    Role::create(['name' => 'Administrator']);
            Role::create(['name' => 'Webmaster']);
            Role::create(['name' => 'Editor']);
            Role::create(['name' => 'User']);
            Role::create(['name' => 'Anonymous']);
	}

}