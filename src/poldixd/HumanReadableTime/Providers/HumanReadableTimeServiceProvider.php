<?php

namespace poldixd\HumanReadableTime\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use poldixd\HumanReadableTime\Components\HumanReadableTime;

class HumanReadableTimeServiceProvider extends ServiceProvider
{
    public function boot()
    {
        Blade::component('human-readable-time', HumanReadableTime::class);
    }
}
