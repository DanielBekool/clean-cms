<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Schedule;

Schedule::command('cms:publish-scheduled')
    ->everyThirtyMinutes()
    ->withoutOverlapping();

Schedule::command('instagram:refresh-token')
    ->monthly()
    ->withoutOverlapping();

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');
