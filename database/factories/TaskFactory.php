<?php

namespace Database\Factories;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Task>
 */
class TaskFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $categories = ['acedemic', 'non-acedemic'];

        return [
            'user_id' => rand(1, 10),
            'task_category_id' => $categories[rand(0, 1)],
            'title' => fake()->words(rand(5, 10), true),
            'description' => fake()->paragraph(rand(7, 15)),
            'course' => fake()->word(),
            'completion_deadline' => Carbon::now()->addDays(rand(7, 14))->format('Y-m-d H:i:s'),
            'payment_amount' => rand(500, 2000),
        ];
    }
}
