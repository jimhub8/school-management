<?php

use App\Myclass;
use App\School;
use App\Syllabus;
use App\User;
use Illuminate\Database\Seeder;

class SyllabusesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();
        // factory(App\Syllabus::class, 50)->create();
        Syllabus::create([
            'file_path'   => $faker->url,
            'description' => $faker->sentences(3, true),
            'title'       => $faker->sentences(1, true),
            'active'      => $faker->randomElement([0, 1]),
            'school_id'   => function () use ($faker) {
                if (School::count())
                    return $faker->randomElement(School::pluck('id')->toArray());
                // else return factory(School::class)->create()->id;
            },
            'class_id' => function() use ($faker) {
                if (Myclass::count())
                    return $faker->randomElement(Myclass::pluck('id')->toArray());
                // else return factory(Myclass::class)->create()->id;
            },
            'user_id'  => function() use ($faker) {
                if (User::count())
                    return $faker->randomElement(User::pluck('id')->toArray());
                // else return factory(User::class)->create()->id;
            },
        ]);
    }
}
