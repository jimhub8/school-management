<?php

use App\Routine;
use App\School;
use App\Section;
use App\User;
use Illuminate\Database\Seeder;

class RoutinesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();
        // factory(App\Routine::class, 50)->create();
        Routine::create([
            'file_path'   => $faker->url,
            'title'       => $faker->sentences(1, true),
            'description' => $faker->sentences(3, true),
            'active'      => $faker->randomElement([0, 1]),
            'school_id'   => function() use ($faker) {
                if (School::count())
                    return $faker->randomElement(School::pluck('id')->toArray());
                // else return factory(School::class)->create()->id;
            },
            'section_id' => function() use ($faker) {
                if (Section::count())
                    return $faker->randomElement(Section::pluck('id')->toArray());
                // else return factory(Section::class)->create()->id;
            },
            'user_id'    => function() use ($faker) {
                if (User::count())
                    return $faker->randomElement(User::pluck('id')->toArray());
                // else return factory(User::class)->create()->id;
            },
        ]);
    }
}
