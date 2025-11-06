<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class ServeWithNpm extends Command
{
    protected $signature = 'serve:dev';
    protected $description = 'Run Laravel serve and npm dev together';

    public function handle()
    {
        $this->info('Starting npm run dev...');

        $npmProcess = proc_open(
            'npm run dev',
            [
                0 => ['pipe', 'r'],
                1 => ['pipe', 'w'],
                2 => ['pipe', 'w'],
            ],
            $pipes,
            base_path()
        );

        if (is_resource($npmProcess)) {
            $this->info('npm run dev started successfully.');
        } else {
            $this->error('Failed to start npm run dev.');
        }

        $this->info('Starting php artisan serve...');

        passthru('php artisan serve');
    }
}
