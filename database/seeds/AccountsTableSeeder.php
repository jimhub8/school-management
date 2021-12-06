<?php

use App\Account;
use App\School;
use App\User;
use Illuminate\Database\Seeder;

class AccountsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // factory(App\Account::class, 50)->create();
        $faker = \Faker\Factory::create();

        Account::create([
            'name'        => $faker->name,
            'type'        => $faker->randomElement(['income', 'expense']),
            'amount'      => $faker->randomNumber(4, false),
            'description' => $faker->sentences(3, true),
            'school_id'   => function () use ($faker) {
                if (School::count())
                    return $faker->randomElement(School::pluck('id')->toArray());
                // else return factory(School::class)->create()->id;
            },
            'user_id'     => function () use ($faker) {
                if (User::where('role', 'accountant')->count())
                    return $faker->randomElement(User::where('role', 'accountant')->pluck('id')->toArray());
                // else return factory(User::class)->states('accountant')->create()->id;
            }
        ]);
    }
}
