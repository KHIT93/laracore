<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Setting;

class SettingsTableSeeder extends Seeder
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
        DB::table('settings')->truncate();
        /**
         * Add default menus.
         */
        Setting::create(['key' => 'site_name', 'value' => 'My Site']);
        Setting::create(['key' => 'site_slogan', 'value' => '']);
        Setting::create(['key' => 'site_home', 'value' => '1']);
        Setting::create(['key' => 'site_theme', 'value' => 'default']);
        Setting::create(['key' => 'site_maintenance', 'value' => '0']);
        Setting::create(['key' => 'maintenance_text', 'value' => 'We are currently making some changes and will be back shortly.']);
        Setting::create(['key' => 'cron_interval', 'value' => '10800']);
    }

}