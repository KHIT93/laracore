<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Models\User;

class LaracoreInitialAdmin extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'laracore:init-admin {email : The new administrator email address} {password : A secure password for the administrator} {--name : A name for the administrator, such as John Doe}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create the initial website administrator account';

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
        if(User::find(1))
        {
            $this->error('The initial administrator does already exist in this installation');
        }
        else
        {
            $this->line('Creating new administrator...');
            $user = new User();
            $user->uid = 1;
            $user->name = ($this->option('name') != '') ? $this->option('name') : 'Administrator';
            $user->email = $this->argument('email');
            $user->password = $this->argument('password');
            $user->enabled = 1;
            if($user->save())
            {
                $this->info('Administrator has been created');
                if($user->roles()->attach(1))
                {
                    $this->info('User promoted to administrator');
                }
            }
            else
            {
                $this->error('The administrator has not been created. Please see the logfile in '.storage_path('logs'));
            }
        }
    }
}
