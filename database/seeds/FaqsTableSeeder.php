<?php

use App\Faq;
use App\User;
use Illuminate\Database\Seeder;

class FaqsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();
        // factory(App\Faq::class, 50)->create();
        Faq::create([
            'question' => $faker->sentence(6, true),
            'answer'   => $faker->sentences(3, true),
            'user_id'  => function () use ($faker) {
              if (User::count())
                return $faker->randomElement(User::pluck('id')->toArray());
            //   else return factory(User::class)->create()->id;
            },
        ]);
    }
}
