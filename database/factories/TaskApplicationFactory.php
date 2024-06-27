<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\TaskApplication>
 */
class TaskApplicationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'task_id' => rand(1, 10),
            'user_id' => rand(1, 10),
            'status' => 'applied',
            'date_applied' => now()
        ];
    }
}
