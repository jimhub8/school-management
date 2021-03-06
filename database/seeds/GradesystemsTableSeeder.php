<?php

use App\Gradesystem;
use App\School;
use App\User;
use Illuminate\Database\Seeder;

class GradesystemsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // factory(App\Gradesystem::class, 2)->create();
        $faker = \Faker\Factory::create();
        Gradesystem::create([
            'grade_system_name' => $faker->randomElement(['Grade System 1','Grade System 2']),
            'grade'             => $faker->randomElement(['A+','A','A-','B+','B','B-','C+','C','C-','D+','D','F']),
            'point'             => $faker->randomElement([2.50,2.75,3.00,3.50,4.00,4.50,5.00]),
            'from_mark'         => $faker->randomElement([0,30,60,70,80,90]),
            'to_mark'           => $faker->randomElement([60,70,80,90,100]),
            'school_id'         => function() use ($faker) {
                if (School::count())
                    return $faker->randomElement(School::pluck('id')->toArray());
                // else return factory(School::class)->create()->id;
            },
            'user_id'           => function() use ($faker) {
                if (User::count())
                    return $faker->randomElement(User::pluck('id')->toArray());
                // else return factory(User::class)->create()->id;
            },
        ]);
    }
}
