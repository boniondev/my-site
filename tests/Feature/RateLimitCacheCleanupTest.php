<?php

/**
 * This Source Code does not contain AI generated code.
 * If downstream edits involve AI generated code, please update or remove this header.
 * 
 * Copyright © 2026 boniondev
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Affero General Public License as
 * published by the Free Software Foundation, either version 3 of the
 * License, or (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
 * See the GNU Affero General Public License for more details.
 *
 * You should have received a copy of the GNU Affero General Public License
 * along with this program. If not, see <https://www.gnu.org/licenses/>.
 */

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
