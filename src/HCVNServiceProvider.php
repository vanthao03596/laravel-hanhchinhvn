<?php

namespace Vanthao03596\HCVN;

use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Collection;
use Illuminate\Support\ServiceProvider;

class HCVNServiceProvider extends ServiceProvider
{
    public function boot(Filesystem $filesystem)
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/../config/config.php' => config_path('hcvn.php'),
            ], 'config');

            $this->publishes([
                __DIR__.'/../database/migrations/create_hcvn_tables.php.stub' => $this->getMigrationFileName($filesystem),
            ], 'migrations');

            $this->publishes([
                __DIR__.'/../resources/data' => resource_path('vendor/laravel-hanhchinhvn/data'),
            ], 'data');

            $this->publishes([
                __DIR__.'/../resources/scripts' => resource_path('vendor/laravel-hanhchinhvn/scripts'),
            ], 'scripts');

            $this->commands([
                Commands\Install::class,
            ]);
        }
    }

    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/../config/config.php', 'hcvn');
    }

    /**
     * Returns existing migration file if found, else uses the current timestamp.
     *
     * @param Filesystem $filesystem
     * @return string
     */
    protected function getMigrationFileName(Filesystem $filesystem): string
    {
        $timestamp = date('Y_m_d_His');

        return Collection::make($this->app->databasePath().DIRECTORY_SEPARATOR.'migrations'.DIRECTORY_SEPARATOR)
            ->flatMap(function ($path) use ($filesystem) {
                return $filesystem->glob($path.'*_create_hcvn_tables.php');
            })->push($this->app->databasePath()."/migrations/{$timestamp}_create_hcvn_tables.php")
            ->first();
    }
}
