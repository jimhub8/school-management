<?php

use App\AccountSector;
use App\School;
use App\User;
use Illuminate\Database\Seeder;

class AccountSectorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Account::factory(App\AccountSector::class, 50)->create();
        $faker = \Faker\Factory::create();
        AccountSector::create([
            'name'      => $faker->catchPhrase,
            'type'      => $faker->randomElement(['income','expense']),
            'school_id' => function () use ($faker) {
                if (School::count())
                    return $faker->randomElement(School::pluck('id')->toArray());
                // else return factory(School::class)->create()->id;
            },
            'user_id'   => function() use ($faker) {
                if (User::where('role','accountant')->count())
                    return $faker->randomElement(User::where('role','accountant')->pluck('id')->toArray());
                // else return factory(User::class)->states('accountant')->create()->id;
            },
        ]);
    }
}
