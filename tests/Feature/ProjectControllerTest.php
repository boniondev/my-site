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
use App\Models\Project;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ProjectControllerTest extends TestCase
{

    use RefreshDatabase;

    public function test_project_controller_index_as_guest(): void
    {

        $response = $this->get(route('projects.index'));

        $response->assertStatus(200);
        $response->assertViewIs('projects.index');

    }

    public function test_project_controller_admin_index_as_guest(): void
    {

        $response = $this->get(route('admin.projects.index'));

        $response->assertRedirect(route('login'));

    }

    public function test_project_controller_admin_index_as_admin(): void
    {

        $admin = Admin::factory()->create();
        $response = $this->actingAs($admin)->get(route('admin.projects.index'));

        $response->assertStatus(200);
        $response->assertViewIs('admin.projects.index');

    }

    public function test_project_controller_store_as_admin(): void
    {

        $admin = Admin::factory()->create();
        $response = $this->actingAs($admin)->post(route('admin.projects.store'), [
            'title' => fake()->words(3,true),
            'description' => fake()->words(3,true),
            'projectURL' => fake()->url(),
        ]);

        $response->assertFound();
        $response->assertSessionHas('success');
        $response->assertRedirectToRoute('admin.projects.index');

    }

    /*
    * Ideally this won't happen, since the admin won't alter the HTML in an effort to send incomplete data
    */
    public function test_project_controller_store_as_admin_without_required_fields(): void
    {

        $this->from(route('admin.projects.index'));

        $admin = Admin::factory()->create();
        $response = $this->actingAs($admin)->post(route('admin.projects.store'), [
            'description' => fake()->words(3,true),
            'projectURL' => fake()->url(),
        ]);

        $response->assertRedirect(route('admin.projects.index'));
        $response->assertSessionHasErrors();

    }

    public function test_project_controller_store_as_guest(): void
    {

        $response = $this->post(route('admin.projects.store'), [
            'title' => fake()->words(3,true),
            'description' => fake()->words(3,true),
            'projectURL' => fake()->url(),
        ]);

        $response->assertRedirectToRoute('login');

    }

    public function test_project_controller_show_as_guest(): void
    {

        $project = Project::factory()->create();

        $response = $this->get(route('projects.show', $project->id));

        $response->assertOk();
        $response->assertViewIs('projects.show');
        $response->assertViewHas('project', $project);

    }

    public function test_project_controller_update_as_guest(): void
    {

        $project = Project::factory()->create();

        $response = $this->put(route('admin.projects.update', $project->id), [
            'title' => fake()->words(3,true),
            'description' => fake()->words(3,true),
            'projectURL' => fake()->url(),
        ]);

        $response->assertRedirect(route('login'));

    }

    public function test_project_controller_update_as_admin(): void
    {

        $admin = Admin::factory()->create();
        $project = Project::factory()->create();

        $data = [
            'title' => fake()->words(3,true),
            'description' => fake()->words(3,true),
            'projectURL' => fake()->url(),
        ];

        $response = $this->actingAs($admin)->put(route('admin.projects.update', $project->id), $data);

        $response->assertRedirect(route('admin.projects.index'));
        $response->assertSessionHas('success');
        $this->assertDatabaseHas('projects', [
            'id' => $project->id,
            'title' => $data['title'],
            'description' => $data['description'],
            'projectURL' => $data['projectURL'],
        ]);

    }

    public function test_project_controller_destroy_as_guest(): void
    {

        $project = Project::factory()->create();

        $response = $this->delete(route('admin.projects.destroy', $project->id));
        
        $response->assertRedirect(route('login'));

    }

    public function test_project_controller_destroy_as_admin(): void
    {

        $admin = Admin::factory()->create();
        $project = Project::factory()->create();

        $response = $this->actingAs($admin)->delete(route('admin.projects.destroy', $project->id));

        $response->assertRedirectToRoute('admin.projects.index');
        $response->assertSessionHas('success');
        $this->assertDatabaseMissing('projects', [
            'id' => $project->id,
        ]);

    }

}
