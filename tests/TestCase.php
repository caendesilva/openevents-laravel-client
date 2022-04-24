<?php

namespace OpenEvents\LaravelClient\Tests;

class TestCase extends \Orchestra\Testbench\TestCase
{
    protected function getPackageProviders($app)
    {
        return [
            \OpenEvents\LaravelClient\OpenEventsServiceProvider::class,
        ];
    }

    protected function getEnvironmentSetUp($app)
    {
        $app['config']->set('openevents.token', 'test');
        $app['config']->set('openevents.endpoint', 'test');

        $app['config']->set('openevents.connection', TestConnection::class);
    }
}
