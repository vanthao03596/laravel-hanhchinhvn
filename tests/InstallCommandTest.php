<?php

namespace Vanthao03596\HCVN\Tests;

class InstallCommandTest extends TestCase
{
    public function test_it_can_install()
    {
        $this->artisan('hcvn:install')
             ->expectsOutput('All done.')
             ->assertExitCode(0);
    }
}
