<?php

namespace Tests\Feature;

use App\Models\Admin;
use App\Models\Task;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class TaskControllerTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();

        // Create a test admin and user
        $this->admin = Admin::factory()->create();
        $this->user = User::factory()->create();
    }

    public function test_task_creation_page_loads_properly()
    {
        $response = $this->actingAs($this->admin, 'admin')->get(route('tasks.create'));

        $response->assertStatus(200);
        $response->assertViewIs('tasks.create');
        $response->assertSee('Admin Name');
        $response->assertSee('Title');
        $response->assertSee('Description');
        $response->assertSee('Assigned User');
    }

    public function test_task_can_be_stored()
    {
        $data = [
            'title' => 'Test Task',
            'description' => 'Test Description',
            'assigned_to_id' => $this->user->id,
            'assigned_by_id' => $this->admin->id,
        ];

        $response = $this->actingAs($this->admin, 'admin')->post(route('tasks.store'), $data);

        $response->assertRedirect(route('tasks.index'));
        $response->assertSessionHas('success', 'Task created successfully.');

        $this->assertDatabaseHas('tasks', $data);
    }

    public function test_task_list_page_loads_properly()
    {
        Task::factory()->create([
            'title' => 'Test Task',
            'description' => 'Test Description',
            'assigned_to_id' => $this->user->id,
            'assigned_by_id' => $this->admin->id,
        ]);

        $response = $this->actingAs($this->admin, 'admin')->get(route('tasks.index'));

        $response->assertStatus(200);
        $response->assertViewIs('tasks.index');
        $response->assertSee('Test Task');
        $response->assertSee('Test Description');
        $response->assertSee($this->user->name);
        $response->assertSee($this->admin->name);
    }
}
