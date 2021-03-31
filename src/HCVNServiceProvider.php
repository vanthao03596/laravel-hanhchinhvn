<?php

namespace Vanthao03596\HCVN;

use Vanthao03596\HCVN\Commands\Install;
use Vanthao03596\LaravelPackageTools\Package;
use Vanthao03596\LaravelPackageTools\PackageServiceProvider;

class HCVNServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package
            ->name('laravel-hanhchinhvn')
            ->hasConfigFile()
            ->hasMigration('create_hcvn_tables')
            ->hasCommand(Install::class);
    }

    public function packageBooted()
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/../resources/data' => resource_path('vendor/laravel-hanhchinhvn/data'),
            ], 'data');

            $this->publishes([
                __DIR__.'/../resources/scripts' => resource_path('vendor/laravel-hanhchinhvn/scripts'),
            ], 'scripts');
        }
    }
}
