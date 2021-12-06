<?php

use App\Event;
use App\School;
use App\User;
use Illuminate\Database\Seeder;

class EventsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // factory(App\Event::class, 50)->create();
        $faker = \Faker\Factory::create();
        Event::create([
            'file_path'   => $faker->url,
            'title'       => $faker->sentences(1, true),
            'description' => $faker->sentences(3, true),
            'active'      => $faker->randomElement([0, 1]),
            'school_id'   => $faker->randomElement(School::pluck('id')->toArray()),
            'user_id'     => function() use ($faker) {
                if (User::count())
                    return $faker->randomElement(User::pluck('id')->toArray());
                // else return factory(User::class)->create()->id;
            },
        ]);
    }
}
