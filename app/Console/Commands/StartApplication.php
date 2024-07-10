<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;
use Symfony\Component\Process\Process;

class StartApplication extends Command
{
    protected $signature = 'app:start';
    protected $description = 'Start the Laravel application and Vite';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $this->info('Application is running. Press Ctrl+C to stop.');

        $this->info('Running composer install...');
        exec('composer install');

        $this->info('Running migrations...');
        Artisan::call('migrate', ['--force' => true]);

        $this->info('Generating application key...');
        Artisan::call('key:generate');

        $this->info('Starting the queue worker...');
        exec('nohup php artisan queue:work > queue.log 2>&1 &');

        $this->info('Creating storage link...');
        Artisan::call('storage:link');

        // Start the Vite development server
        $vite = new Process(['npm', 'run', 'dev']);
        $vite->start();
        $this->info('Vite development server started.');

        $this->info('Starting the development server...');
        exec('php artisan serve');

        return 0;
    }
}
