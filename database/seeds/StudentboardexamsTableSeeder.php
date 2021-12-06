<?php

use App\StudentBoardExam;
use App\User;
use Illuminate\Database\Seeder;

class StudentboardexamsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // factory(App\StudentBoardExam::class, 200)->create();
        $faker = \Faker\Factory::create();
        $student_id = $faker->randomElement(User::student()->pluck('id')->toArray());
        StudentBoardExam::create([
            'student_id'       => $student_id,
            'user_id'          => $student_id,
            'exam_name'        => $faker->randomElement(['JSC', 'SSC', 'O Level', 'A Level']),
            'group'            => $faker->randomElement(['science', 'commerce', 'arts']),
            'roll'             => $faker->randomNumber(7, false),
            'registration'     => $faker->randomNumber(7, false),
            'session'          => '2018-19',
            'board'            => $faker->randomElement(['dhaka', 'rajsahi', 'sylhet']),
            'passing_year'     => 2011,
            'institution_name' => 'efnj school',
            'gpa'              => 5.00,
        ]);
    }
}
