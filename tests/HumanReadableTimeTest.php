<?php

namespace Tests;

use Illuminate\Support\Facades\View;
use poldixd\HumanReadableTime\Components\HumanReadableTime;

class HumanReadableTimeTest extends TestCase
{
    /** @test */
    public function can_render_human_readable_time()
    {
        $time = now()->subMinutes(15);

        $output = view('human_readable_time', ['datetime' => $time])->render();

        $this->assertStringContainsString(
            sprintf('<time datetime="%s">15 minutes before</time>', $time->toDateTimeString()),
            $output
        );
    }

    /** @test */
    public function can_render_time()
    {
        $time = now()->subMinutes(61);

        $output = view('human_readable_time', ['datetime' => $time])->render();

        $this->assertStringContainsString(
            sprintf('<time datetime="%s">%s</time>', $time->toDateTimeString(), $time->toDateTimeString()),
            $output
        );
    }

    /** @test */
    public function can_render_time_with_custom_format()
    {
        $time = now()->subMinutes(61);
        $format = 'd.m.Y H:i:s';

        $output = view('human_readable_time_custom_format', ['datetime' => $time, 'format' => $format])->render();

        $this->assertStringContainsString(
            sprintf('<time datetime="%s">%s</time>', $time->toDateTimeString(), $time->format($format)),
            $output
        );
    }
}