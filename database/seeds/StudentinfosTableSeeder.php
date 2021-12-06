<?php

use App\StudentInfo;
use App\User;
use Illuminate\Database\Seeder;

class StudentinfosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();
        // factory(StudentInfo::class, 50)->states('without_group')->create();
        // factory(StudentInfo::class, 25)->states('science')->create();
        // factory(StudentInfo::class, 15)->states('commerce')->create();
        // factory(StudentInfo::class, 10)->states('arts')->create();

        StudentInfo::create([
            'student_id'           => $faker->randomElement(User::student()->pluck('id')->toArray()),
            'session'              => now()->year,
            'version'              => $faker->randomElement(['bangla', 'english']),
            'group'                => $faker->randomElement(['', 'science', 'commerce', 'arts']),
            'birthday'             => $faker->dateTimeThisCentury->format('Y-m-d'),
            'religion'             => $faker->randomElement(['islam','hinduism','christianism','buddhism','other']),
            'father_name'          => $faker->name,
            'father_phone_number'  => $faker->randomNumber(7, false),
            'father_national_id'   => "SA0218IBYZVZJSEC8536V4XC",
            'father_occupation'    => $faker->jobTitle,
            'father_designation'   => $faker->jobTitle,
            'father_annual_income' => $faker->randomElement([1000000, 500000, 300000, 700000]),
            'mother_name'          => $faker->name,
            'mother_phone_number'  => $faker->randomNumber(7, false),
            'mother_national_id'   => "SA0218IBYZVZJSEC8536V4XC",
            'mother_occupation'    => $faker->jobTitle,
            'mother_designation'   => $faker->jobTitle,
            'mother_annual_income' => $faker->randomElement([1000000, 500000, 300000, 700000]),
          ]);
    }
}
