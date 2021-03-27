<?php

namespace Vanthao03596\HCVN\Tests;

use Orchestra\Testbench\TestCase as Orchestra;
use Vanthao03596\HCVN\HCVNServiceProvider;

abstract class TestCase extends Orchestra
{
    public function setUp(): void
    {
        parent::setUp();
    }

    protected function getPackageProviders($app)
    {
        return [
            HCVNServiceProvider::class,
        ];
    }

    public function getEnvironmentSetUp($app)
    {
        $app['config']->set('database.default', 'sqlite');
        $app['config']->set('database.connections.sqlite', [
            'driver' => 'sqlite',
            'database' => ':memory:',
            'prefix' => '',
        ]);

        include_once __DIR__.'/../database/migrations/create_hcvn_tables.php.stub';
        (new \CreateHcvnTables())->up();
    }
}