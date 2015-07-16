<?php

namespace App\Console\Commands;

use App\Setting;
use Illuminate\Console\Command;

class LaracoreMaintenanceDisable extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'laracore:up';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Disable the site maintenance from the command-line';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        Setting::whereKey('site_maintenance')->first()->update(['value' => 0]);
        $this->info('Site maintenance is now disabled');
    }
}
