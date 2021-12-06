<?php

use App\Attendance;
use App\Exam;
use App\School;
use App\Section;
use App\User;
use Illuminate\Database\Seeder;

class AttendancesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // factory(App\Attendance::class, 50)->create();
        $faker = \Faker\Factory::create();
        Attendance::create([
            'present'    => $faker->randomElement([0,1,2]),
            'student_id' => function () use ($faker) {
                if (User::student()->count())
                    return $faker->randomElement(User::student()->take(10)->pluck('id')->toArray());
                // else return factory(User::class)->create(['role' => 'student'])->id;
            },
            'section_id' => function () use ($faker) {
                if (Section::count())
                    return $faker->randomElement(Section::pluck('id')->toArray());
                // else return factory(Section::class)->create()->id;
            },
            'exam_id'    => function () use ($faker) {
                if (Exam::count())
                    return $faker->randomElement(Exam::bySchool($faker->randomElement(School::pluck('id')->toArray()))->pluck('id')->toArray());
                // else return factory(Exam::class)->create()->id;
            },
            'user_id'    => function () use ($faker) {
                if (User::count())
                    return $faker->randomElement(User::pluck('id')->toArray());
                // else return factory(User::class)->create()->id;
            },
        ]);
    }
}
