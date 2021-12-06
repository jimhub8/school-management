<?php

use App\Exam;
use App\School;
use App\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class ExamsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // factory(App\Exam::class, 10)->create();
        $faker = \Faker\Factory::create();
        Exam::create([
            'exam_name' => $faker->words(3, true),
            'school_id' => function() use ($faker) {
                if (School::count())
                    return $faker->randomElement(School::pluck('id')->toArray());
                // else return factory(School::class)->create()->id;
            },
            'term'             => $faker->text(20),
            'active'           => $faker->randomElement([0,1]),
            'start_date'       => $faker->dateTime()->format('Y-m-d H:i:s'),
            'end_date'         => $faker->dateTime()->format('Y-m-d H:i:s'),
            'notice_published' => $faker->randomElement([0,1]),
            'result_published' => $faker->randomElement([0,1]),
            'user_id'          => function() use ($faker) {
                if (User::count())
                    return $faker->randomElement(User::pluck('id')->toArray());
                // else return factory(User::class)->create()->id;
            },
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
