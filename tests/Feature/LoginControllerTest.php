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

use App\Models\Admin;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;
use function PHPUnit\Framework\assertFalse;

class LoginControllerTest extends TestCase
{

    use RefreshDatabase;

    public function test_login_controller_index(): void
    {

        $response = $this->get(route('login.index'));

        $response->assertOk();
        $response->assertViewIs('login');

    }

    public function test_login_controller_store_login_with_valid_credentials(): void
    {

        $credentials = [
            'username' => fake()->userName(),
            'password' => fake()->password(),
        ];

        $admin = Admin::factory()->create([
            'username' => $credentials['username'],
            'password' => Hash::make($credentials['password']),
        ]);

        $response = $this->post(route('login.store'), $credentials);

        $response->assertRedirect(route('admin.dashboard'));
        $this->assertAuthenticatedAs($admin);

    }

    public function test_login_controller_store_login_with_invalid_credentials(): void
    {

        $credentials = [
            'username' => fake()->userName(),
            'password' => fake()->password(),
        ];

        $response = $this->post(route('login.store'), $credentials);

        $response->assertRedirect(route('login.index'));
        $response->assertSessionHasErrors('error');

    }

    public function test_login_controller_destroy(): void
    {

        $admin = Admin::factory()->create();

        $response = $this->actingAs($admin)->delete(route('login.destroy'));

        $response->assertRedirect(route('login.index'));
        assertFalse($this->isAuthenticated());

    }

}
