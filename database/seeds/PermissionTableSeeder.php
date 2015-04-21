<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Permission;

class PermissionTableSeeder extends Seeder {

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
            DB::table('permissions')->truncate();
            /**
             * Add default Permissions and mappings.
             */
	    
	}

}