<?php

use function Spatie\PestPluginTestTime\testTime;
use function Spatie\Snapshots\assertMatchesSnapshot;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Blade;

it('can render human readable time', function () {
    testTime()->freeze('2023-01-27 09:27:34');

    $datetime = Carbon::parse('2023-01-27 09:12:34');

    $html = Blade::render('<x:human-readable-time :datetime="$datetime" />', compact('datetime'));

    assertMatchesSnapshot($html);
});

it('can render time', function () {
    testTime()->freeze('2023-01-27 10:13:34');

    $datetime = Carbon::parse('2023-01-27 09:12:34');

    $html = Blade::render('<x:human-readable-time :datetime="$datetime" />', compact('datetime'));

    assertMatchesSnapshot($html);
});

it('can render time with custom format', function () {
    $format = 'd.m.Y H:i:s';

    testTime()->freeze('2023-01-27 10:13:34');

    $datetime = Carbon::parse('2023-01-27 09:12:34');

    $html = Blade::render('<x:human-readable-time :datetime="$datetime" :format="$format" />', compact('datetime', 'format'));

    assertMatchesSnapshot($html);
});