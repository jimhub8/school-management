<?php

use App\Department;
use App\School;
use Illuminate\Database\Seeder;

class DepartmentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    //    Department::factory(App\Department::class, 10)->create();
        $faker = \Faker\Factory::create();
        Department::create([
        'school_id'       => 1,
        // function () use ($faker) {
        //     if (School::count())
        //         return $faker->randomElement(School::pluck('id')->toArray());
            // else return Department::factory(School::class)->create()->id;
        // },
        'department_name' => 'English',
    ]);
    }
}
