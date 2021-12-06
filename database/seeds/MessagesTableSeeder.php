<?php

use App\Message;
use App\School;
use App\User;
use Illuminate\Database\Seeder;

class MessagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // factory(App\Message::class, 50)->create();
        $faker = \Faker\Factory::create();
        Message::create([
            'phone_number' => $faker->randomNumber(7, false),
            'email'        => $faker->unique()->safeEmail,
            'message'      => $faker->sentences(3, true),
            'school_id'    => function () use ($faker) {
              if (School::count())
                return $faker->randomElement(School::pluck('id')->toArray());
            //   else return factory(School::class)->create()->id;
            },
            'user_id'      => function () use ($faker) {
              if (User::count())
                return $faker->randomElement(User::pluck('id')->toArray());
            //   else return factory(User::class)->create()->id;
            },
        ]);
    }
}
