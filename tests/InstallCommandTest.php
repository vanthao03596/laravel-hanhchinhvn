<?php

namespace Vanthao03596\HCVN\Tests;

use Illuminate\Support\Facades\DB;
use Vanthao03596\HCVN\Commands\Install;

class InstallCommandTest extends TestCase
{
    public function test_it_can_install()
    {
        $tableNames = config('hanhchinhvn.table_names');

        $this->assertTrue(DB::table($tableNames['provinces'])->count() === 0);
        $this->assertTrue(DB::table($tableNames['districts'])->count() === 0);
        $this->assertTrue(DB::table($tableNames['districts'])->count() === 0);

        $this->artisan(Install::class);

        $this->assertTrue(DB::table($tableNames['provinces'])->count() > 0);
        $this->assertTrue(DB::table($tableNames['districts'])->count() > 0);
        $this->assertTrue(DB::table($tableNames['districts'])->count() > 0);
    }
}
