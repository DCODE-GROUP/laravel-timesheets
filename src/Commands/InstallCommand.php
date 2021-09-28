<?php

namespace Dcodegroup\LaravelTimesheet\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Schema;

class InstallCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'laravel-timesheets:install';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Install all of the Laravel Timesheets Database';

    /**
     * @return void
     */
    public function handle()
    {
        if (! Schema::hasTable('timesheets') && ! class_exists('CreateTimesheetsTable')) {
            $this->comment('Publishing Laravel Timesheets Migrations');
            $this->callSilent('vendor:publish', ['--tag' => 'laravel-timesheets-migrations']);
        }

        $this->info('Laravel Timesheets scaffolding installed successfully.');
    }
}