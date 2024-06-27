<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\TutorAd>
 */
class TutorAdFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $available_schedules = ["Mon-Fri", "Thur-Sat", "Sun"];
        $statuses = ["pending", "active"];

        return [
            'user_id' => rand(1, 5),
            'campus_id' => rand(1, 10),
            'headline' => fake()->sentence(rand(4, 7)),
            'description' => fake()->paragraph(rand(3, 6)),
            'course_tags' => "Mat 101, CSC 101, ICH 221",
            'availability_schedule' => fake()->randomElement($available_schedules),
            'price' => rand(500, 2000),
            'status' => $statuses[rand(0, 1)]
        ];
    }
}
