<?php

use App\School;
use Illuminate\Database\Seeder;

class SchoolsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();
        School::create([
        'name'        => $faker->name,
        'about'       => $faker->sentences(3, true),
        'medium'      => $faker->randomElement(['bangla', 'english']),
        'code'        => date("y").substr(number_format(time() * mt_rand(),0,'',''),0,6),
        'established' => $faker->name,
        'theme'       => 'flatly',
    ]);
    }
}
