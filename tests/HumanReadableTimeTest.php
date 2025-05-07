<?php

use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Blade;

it('can render human readable time', function () {
    $this->travelTo('2023-01-27 09:27:34');

    $datetime = Carbon::parse('2023-01-27 09:12:34');

    expect(Blade::render('<x:human-readable-time :datetime="$datetime" />', compact('datetime')))->toMatchSnapshot();
});

it('can render time', function () {
    $this->travelTo('2023-01-27 10:13:34');

    $datetime = Carbon::parse('2023-01-27 09:12:34');

    expect(Blade::render('<x:human-readable-time :datetime="$datetime" />', compact('datetime')))->toMatchSnapshot();
});

it('can render time with custom format', function () {
    $format = 'd.m.Y H:i:s';

    $this->travelTo('2023-01-27 10:13:34');

    $datetime = Carbon::parse('2023-01-27 09:12:34');

    expect(Blade::render('<x:human-readable-time :datetime="$datetime" :format="$format" />', compact('datetime', 'format')))->toMatchSnapshot();
});
