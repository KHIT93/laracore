<?php namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{

    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        \App\Console\Commands\Inspire::class,
        \App\Console\Commands\LaracoreInitialization::class,
        \App\Console\Commands\LaracoreInitialAdmin::class,
        \App\Console\Commands\LaracoreMaintenanceEnable::class,
        \App\Console\Commands\LaracoreMaintenanceDisable::class,
        \App\Console\Commands\LaracoreReset::class,
        \App\Console\Commands\LaracoreUpdate::class,
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        $schedule->command('inspire')
            ->hourly();
    }

}
