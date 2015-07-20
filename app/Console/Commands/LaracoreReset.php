<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class LaracoreReset extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'laracore:reset';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Completely reset the application and start over';

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
        $this->error('Now resetting...');
        $this->call('migrate:reset');
        unlink(base_path('.env'));
        $this->info('Reset complete');
    }
}
