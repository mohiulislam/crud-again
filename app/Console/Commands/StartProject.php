<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class StartProject extends Command
{
    // The name and signature of the console command.
    protected $signature = 'start';

    // The console command description.
    protected $description = 'Run all necessary commands to start the project';

    // Execute the console command.
    public function handle()
    {
        // Run Laravel commands
        $this->info('Running Laravel migrations...');
        $this->call('migrate');

        $this->info('Running Laravel seeders...');
        $this->call('db:seed');

        $this->info('Clearing cache...');
        $this->call('cache:clear');

        $this->info('Caching configuration...');
        $this->call('config:cache');

        // Run npm command
        $this->info('Running npm run dev...');
        exec('npm run dev');

        $this->info('Project started successfully!');
    }
}
