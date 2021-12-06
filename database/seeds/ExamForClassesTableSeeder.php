<?php

use App\Exam;
use App\ExamForClass;
use App\Myclass;
use Illuminate\Database\Seeder;

class ExamForClassesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();
        // factory(App\ExamForClass::class, 30)->create();
        ExamForClass::create([
            'class_id' => $faker->randomElement(Myclass::pluck('id')->toArray()),
            'exam_id'  => $faker->randomElement(Exam::where('active', 1)->pluck('id')->toArray()),
            'active'   => $faker->randomElement([0, 1]),
        ]);
    }
}
