<?php

use App\Myclass;
use App\School;
use App\User;
use Illuminate\Database\Seeder;

class ClassesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // factory(App\Myclass::class, 13)->create();
        $faker = \Faker\Factory::create();
        Myclass::create([
            'class_number'      => $faker->catchPhrase,
            'school_id' => 1,
            'group'   => 'test'
        ]);
    }
}


