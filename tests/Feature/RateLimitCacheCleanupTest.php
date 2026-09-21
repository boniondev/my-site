<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\DB;
use Tests\TestCase;

class RateLimitCacheCleanupTest extends TestCase
{

    use RefreshDatabase;

    public function test_remove_expired_cache_entry(): void
    {

        $values = [
            'key' => 'laravel-lookAtMeIAmSHA-1',
            'value' => 'i:1',
            'expiration' => now()->subMinute()->timestamp,
        ];

        DB::table(config('cache.stores.database.table'))->insert($values);

        $this->artisan('app:cleanup-expired-rate-limit-cache')->assertSuccessful();
        $this->assertDatabaseMissing(config('cache.stores.database.table'), $values);

    }

    public function test_retain_unexpired_cache_entry(): void
    {

        $values = [
            'key' => 'laravel-lookAtMeIAmSHA-1',
            'value' => 'i:1',
            'expiration' => now()->addMinute()->timestamp,
        ];

        DB::table(config('cache.stores.database.table'))->insert($values);

        $this->artisan('app:cleanup-expired-rate-limit-cache')->assertSuccessful();
        $this->assertDatabaseHas(config('cache.stores.database.table'), $values);

    }

}
