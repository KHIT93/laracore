<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class LaracoreInitialization extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'laracore:install';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Initialize and install laracore from the command-line';

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
        $this->line('We are now installing the laracore application data and preparing the database. Please be patient');
        $this->call('key:generate');
        $this->line('Running migrations');
        $this->call('migrate');
        $this->line('Populating core data tables');
        $this->call('db:seed');
        $this->info('Initial tasks for Laracore are now completed. Please run \'php artisan laracore:init-admin\' to start creating content');
    }
}
