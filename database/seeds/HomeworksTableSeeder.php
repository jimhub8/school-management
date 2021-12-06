<?php

use App\Homework;
use App\Section;
use App\User;
use Illuminate\Database\Seeder;

class HomeworksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // factory(App\Homework::class, 50)->create();
        $faker = \Faker\Factory::create();
        Homework::create([
            'file_path'   => $faker->url,
            'description' => $faker->sentences(3, true),
            'teacher_id'  => $faker->randomElement(User::where('role', 'teacher')->pluck('id')->toArray()),
            'section_id'  => $faker->randomElement(Section::pluck('id')->toArray())
        ]);
    }
}
