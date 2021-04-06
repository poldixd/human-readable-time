<?php

namespace Tests;

use poldixd\HumanReadableTime\Providers\HumanReadableTimeServiceProvider;
use Orchestra\Testbench\TestCase as BaseTestCase;

class TestCase extends BaseTestCase
{
    protected function getPackageProviders($app)
    {
        return [
            HumanReadableTimeServiceProvider::class,
        ];
    }

    protected function getEnvironmentSetUp($app)
    {
        $app['config']->set('app.locale', 'de');

        $app['config']->set('view.paths', [
            __DIR__ . '/views',
            resource_path('views'),
        ]);
    }
}
