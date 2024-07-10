<?php

namespace Tests\Feature;

use App\Models\Admin;
use App\Models\Statistic;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class StatisticsControllerTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();

        // Create a test admin and users with statistics
        $this->admin = Admin::factory()->create();
        $this->users = User::factory()->count(3)->create()->each(function ($user) {
            Statistic::create([
                'user_id' => $user->id,
                'task_count' => rand(1, 10),
            ]);
        });
    }

    public function test_statistics_page_loads_properly()
    {
        $response = $this->actingAs($this->admin, 'admin')->get(route('statistics.index'));

        $response->assertStatus(200);
        $response->assertViewIs('statistics.index');
        $response->assertSee('User');
        $response->assertSee('Task Count');
    }

    public function test_statistics_page_displays_top_users()
    {
        $response = $this->actingAs($this->admin, 'admin')->get(route('statistics.index'));

        $response->assertStatus(200);

        foreach ($this->users as $user) {
            $response->assertSee($user->name);
            $response->assertSee($user->statistic->task_count);
        }
    }

    public function test_statistics_page_limits_to_top_10_users()
    {
        // Create additional users to exceed the limit
        User::factory()->count(12)->create()->each(function ($user) {
            Statistic::create([
                'user_id' => $user->id,
                'task_count' => rand(1, 10),
            ]);
        });

        $response = $this->actingAs($this->admin, 'admin')->get(route('statistics.index'));

        $response->assertStatus(200);
        $this->assertCount(10, $response->viewData('statistics'));
    }
}
