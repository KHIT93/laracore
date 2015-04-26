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
	    Role::create(['name' => 'administrator', 'display_name' => 'Administrator', 'description' => 'Administrator account with all permissions.']);
            Role::create(['name' => 'webmaster', 'display_name' => 'Webmaster', 'description' => 'Administrative account for managing the day to day tasks.']);
            Role::create(['name' => 'editor', 'display_name' => 'Editor', 'description' => 'Account for managing the content and nodes available on the website. This role should not have any administrative access.']);
            Role::create(['name' => 'user', 'display_name' => 'User', 'description' => 'Generic account for all users created. This should be considered an account for fx. forum users and they should not have any access to administrative pages or content.']);
            Role::create(['name' => 'anonymous', 'display_name' => 'Anonymous User', 'description' => 'This role is for guest/anonymous users. Since this role is assigned to any users that have not been authenticated on the website, it should be considered a security risk to modify the default permissions for this role']);
	}

}