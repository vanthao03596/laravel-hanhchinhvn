<?php

namespace Vanthao03596\HCVN\Tests;

use Vanthao03596\HCVN\Commands\Install;

class InstallCommandTest extends TestCase
{
    public function test_it_can_install()
    {
        $this->artisan(Install::class)
            ->expectsOutput('All done.');
    }
}
