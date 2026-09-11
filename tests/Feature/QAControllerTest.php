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
use App\Models\QA;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class QAControllerTest extends TestCase
{
    
    use RefreshDatabase;

    public function test_qa_controller_index(): void
    {

        $QA = QA::factory()->count(10)->create();

        $response = $this->get(route('qa.index'));

        $response->assertViewIs('QA.index');
        $this->assertDatabaseHas($QA);

    }

    public function test_qa_controller_admin_index(): void
    {

        $admin = Admin::factory()->create();
        $QA = QA::factory()->count(10)->create();

        $response = $this->actingAs($admin)->get(route('admin.qa.index'));

        $response->assertViewIs('admin.QA.index');
        $this->assertDatabaseHas($QA);

    }

    public function test_qa_controller_admin_index_as_guest(): void
    {

        $response = $this->get(route('admin.qa.index'));

        $response->assertRedirect(route('login.index'));

    }

    public function test_qa_controller_store_as_guest(): void
    {

        $QAQuestion = [
            'question' => fake()->words(10,true),
        ];

        $QA = QA::factory()->createOne([
            'question' => $QAQuestion['question'],
        ]);

        $response = $this->post(route('qa.store'), $QAQuestion);

        $response->assertRedirect(route('qa.index'));
        $this->assertDatabaseHas($QA);

    }

    public function test_qa_controller_update_as_admin(): void
    {

        $QA = QA::factory()->create([
            'question' => fake()->words(10,true),
        ]);

        $QAData = [
            'answer' => fake()->words(10,true),
            'hidden' => 0,
        ];

        $admin = Admin::factory()->create();

        $response = $this->actingAs($admin)->put(route('admin.qa.update', $QA->id), $QAData);

        $response->assertRedirect(route('admin.qa.index'));
        $this->assertDatabaseHas('QA', [
            'id' => $QA->id,
            'question' => $QA->question,
            'answer' => $QAData['answer'],
            'hidden' => $QAData['hidden'],
        ]);

    }

    public function test_qa_controller_update_as_guest(): void
    {

        $QA = QA::factory()->create();

        $response = $this->put(route('admin.qa.update', $QA->id), ['answer' => fake()->words(10,true)]);

        $response->assertRedirect(route('login.index'));
        $this->assertDatabaseHas($QA);

    }

    public function test_qa_controller_destroy_as_admin(): void
    {

        $admin = Admin::factory()->create();
        $QA = QA::factory()->create();

        $response = $this->actingAs($admin)->delete(route('admin.qa.destroy', $QA->id));

        $response->assertRedirect(route('admin.qa.index'));
        $this->assertDatabaseMissing($QA);

    }

    public function test_qa_controller_destroy_as_guest(): void
    {

        $QA = QA::factory()->create();

        $response = $this->delete(route('admin.qa.destroy', $QA->id));

        $response->assertRedirect(route('login.index'));
        $this->assertDatabaseHas($QA);

    }

}
