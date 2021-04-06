<?php

namespace poldixd\HumanReadableTime\Components;

use Illuminate\View\Component;
use Carbon\Carbon;

class HumanReadableTime extends Component
{
    public Carbon $datetime;
    public string $humanUntil;
    public string $format;
    public string $output;

    public function __construct($datetime, string $humanUntil = '-1 hour', string $format = 'Y-m-d H:i:s')
    {
        $this->datetime = $datetime;
        $this->humanUntil = $humanUntil;
        $this->format = $format;

        $this->output = $datetime->lessThan(now()->modify($this->humanUntil))
            ? $datetime->format($this->format)
            : $datetime->diffForHumans(now());
    }

    public function render()
    {
        return <<<'blade'
            <time {{ $attributes->merge(['datetime' => $datetime->toDateTimeString()]) }}>{{ $output }}</time>
        blade;
    }
}
