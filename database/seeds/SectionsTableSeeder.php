<?php

// namespace Database\Seeders;

use App\Myclass;
use App\Section;
use Illuminate\Database\Seeder;

class SectionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // factory(App\Section::class, 20)->create();
        Section::factory()
            ->count(2)
            ->create();

       /*  $faker = \Faker\Factory::create();
        // dd($faker->randomElement(Myclass::pluck('id')->toArray()));
        Section::create([
            'section_number' => $faker->randomElement(['A', 'B','C','D','E','F','G','H','I','J','K','L','M']),
            'room_number'    => $faker->randomDigitNotNull,
            'class_id'       => function() use ($faker) {
                if (Myclass::count())
                    return $faker->randomElement(Myclass::pluck('id')->toArray());
                // else return factory(Myclass::class)->create()->id;
            },
        ]); */
    }
}
