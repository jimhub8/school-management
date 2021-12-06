<?php

use App\Notification;
use App\User;
use Illuminate\Database\Seeder;

class NotificationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();
        // factory(App\Notification::class, 50)->create();
        Notification::create([
            'sent_status' => $faker->randomElement([0, 1]),
            'active'      => $faker->randomElement([0, 1]),
            'message'     => $faker->sentences(3, true),
            'student_id'  => $faker->randomElement(App\User::student()->pluck('id')->toArray()),
            'user_id'     => function() use ($faker) {
                if (User::count())
                    return $faker->randomElement(User::pluck('id')->toArray());
                // else return factory(User::class)->create()->id;
            },
        ]);
    }
}
