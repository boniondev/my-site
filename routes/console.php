<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Schedule;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');

Schedule::call(function () {
    DB::table(config('cache.stores.database.table'))->where('expiration', '<=', now()->timestamp)->delete();
})->everyTenMinutes();