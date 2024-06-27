<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Task;
use App\Models\User;
use App\Models\Campus;
use App\Models\TaskApplication;
use App\Models\TaskCategory;
use App\Models\TutorAd;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->create([
            'fullname' => 'Admin Admin',
            'username' => 'admin',
            'bio' => fake()->paragraph(3),
            'email' => 'admin@gmail.com',
            'phone' => '+234 916 075 5152',
            'campus_id' => 1,
            'overall_rating' => 5.0,
            'password' => Hash::make('admin')
        ]);


        Campus::factory(10)->create();
        User::factory(10)->create();
        TaskCategory::factory(2)->create();
        Task::factory(2)->create();
        TaskApplication::factory(50)->create();
        TutorAd::factory(20)->create();
    }
}
