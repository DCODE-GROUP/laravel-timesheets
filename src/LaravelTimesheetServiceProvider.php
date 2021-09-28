<?php

namespace Dcodegroup\LaravelTimesheet;

use Dcodegroup\LaravelTimesheet\Commands\InstallCommand;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class LaravelTimesheetServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application events.
     */
    public function boot()
    {
        $this->offerPublishing();
        $this->registerCommands();
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Setup the resource publishing groups for Dcodegroup Xero oAuth.
     *
     * @return void
     */
    protected function offerPublishing()
    {
        if (!Schema::hasTable('timesheets') && !class_exists('CreateTimesheetsTable')) {
            $timestamp = date('Y_m_d_His', time());

            $this->publishes([
                                 __DIR__ . '/../database/migrations/create_timesheets_table.php.stub.php' => database_path('migrations/' . $timestamp . '_create_timesheets_table.php'),
                             ], 'laravel-timesheets-migrations');
        }
    }

    protected function registerCommands()
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
                                InstallCommand::class,
                            ]);
        }
    }
}