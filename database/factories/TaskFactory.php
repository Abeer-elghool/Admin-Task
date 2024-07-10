<?php

namespace Database\Factories;

use App\Models\Task;
use App\Models\User;
use App\Models\Admin;
use Illuminate\Database\Eloquent\Factories\Factory;

class TaskFactory extends Factory
{
    protected $model = Task::class;

    public function definition()
    {
        return [
            'title' => $this->faker->sentence,
            'description' => $this->faker->paragraph,
            'assigned_to_id' => User::factory(),
            'assigned_by_id' => Admin::factory(),
        ];
    }
}
