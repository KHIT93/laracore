<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Models\Permission;

class PermissionTableSeeder extends Seeder
{

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
        DB::table('permissions')->delete();
        /**
         * Add default Permissions and mappings.
         */
        Permission::create([
            'name' => 'access_admin_ui',
            'display_name' => 'Access the administrative UI',
            'description' => 'Allows access to the UI/theme for the administrative pages'
        ]);
        Permission::create([
            'name' => 'access_admin_dashboard',
            'display_name' => 'Access the administrative dashboard',
            'description' => 'Allows access to view the administrative dashboard'
        ]);
        Permission::create([
            'name' => 'access_admin_content',
            'display_name' => 'Access the content management pages',
            'description' => 'Allows access to the pages used to manage the page content/nodes'
        ]);
        Permission::create([
            'name' => 'access_admin_layout',
            'display_name' => 'Access the administrative pages for the site layout',
            'description' => 'Allows access to the administrative pages for layout management'
        ]);
        Permission::create([
            'name' => 'access_admin_menus',
            'display_name' => 'Access the administrative pages for menus',
            'description' => 'Allows access to the administrative pages for menus and links'
        ]);
        Permission::create([
            'name' => 'access_admin_blocks',
            'display_name' => 'Access the pages used to manage blocks',
            'description' => 'Allows access to tthe UI for managing blocks, such as menu placement and banners'
        ]);
        Permission::create([
            'name' => 'access_admin_themes',
            'display_name' => 'Manage themes',
            'description' => 'Allows access to the UI for managing themes'
        ]);
        Permission::create([
            'name' => 'access_admin_modules',
            'display_name' => 'Manage modules',
            'description' => 'Allows access for managing modules'
        ]);
        Permission::create([
            'name' => 'access_admin_users',
            'display_name' => 'Manage users, roles and permissions',
            'description' => 'Allows access to manage users, roles and permisson assignment'
        ]);
        Permission::create([
            'name' => 'access_admin_config',
            'display_name' => 'Manage website configuration',
            'description' => 'Allows access to change various settings and configuratons of the website'
        ]);
        Permission::create([
            'name' => 'access_admin_reports',
            'display_name' => 'Access various site reports',
            'description' => 'Allows access to view various site reports, such as latest log messages, and recent 404 (Page Not Found) errors'
        ]);
        Permission::create([
            'name' => 'access_maintenance',
            'display_name' => 'Access the site while in maintenance mode',
            'description' => 'Allows access to the site while it is in maintenance mode. This does not include maintenance triggered from the command-line'
        ]);
    }

}