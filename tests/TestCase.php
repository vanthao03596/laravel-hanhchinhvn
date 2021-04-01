<?php

namespace Vanthao03596\HCVN\Tests;

use Illuminate\Support\Facades\Schema;
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
        Schema::dropAllTables();

        include_once __DIR__.'/../database/migrations/create_hcvn_tables.php.stub';
        
        (new \CreateHcvnTables())->up();
    }
}
