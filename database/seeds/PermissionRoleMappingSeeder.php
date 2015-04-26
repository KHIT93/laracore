<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Role;
use App\Permission;

class PermissionRoleMappingSeeder extends Seeder {

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
            DB::table('permission_role')->delete();
            /**
             * Add default mappings between permissions and roles.
             */
	    Role::where('name', '=', 'webmaster')->first()->perms()->sync([
                Permission::where('name', '=', 'access_admin_ui')->first()->id,
                Permission::where('name', '=', 'access_admin_dashboard')->first()->id,
                Permission::where('name', '=', 'access_admin_content')->first()->id,
                Permission::where('name', '=', 'access_admin_layout')->first()->id,
                Permission::where('name', '=', 'access_admin_menus')->first()->id,
                Permission::where('name', '=', 'access_admin_blocks')->first()->id,
                Permission::where('name', '=', 'access_admin_themes')->first()->id,
                Permission::where('name', '=', 'access_admin_config')->first()->id,
                Permission::where('name', '=', 'access_admin_reports')->first()->id
            ]);
            Role::where('name', '=', 'editor')->first()->perms()->sync([
                Permission::where('name', '=', 'access_admin_ui')->first()->id,
                Permission::where('name', '=', 'access_admin_dashboard')->first()->id,
                Permission::where('name', '=', 'access_admin_content')->first()->id,
                Permission::where('name', '=', 'access_admin_layout')->first()->id,
                Permission::where('name', '=', 'access_admin_menus')->first()->id,
                Permission::where('name', '=', 'access_admin_blocks')->first()->id,
                Permission::where('name', '=', 'access_admin_reports')->first()->id
            ]);
	}

}