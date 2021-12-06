<?php

use App\Feedback;
use App\User;
use Illuminate\Database\Seeder;

class FeedbacksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // factory(App\Feedback::class, 50)->create();
        $faker = \Faker\Factory::create();
        Feedback::create([
            'description' => $faker->sentences(3, true),
            'student_id'  => $faker->randomElement(User::student()->pluck('id')->toArray()),
            'teacher_id'  => $faker->randomElement(User::where('role', 'teacher')->pluck('id')->toArray())
        ]);
    }
}
