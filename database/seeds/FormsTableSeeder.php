<?php

use App\Form;
use App\School;
use App\User;
use Illuminate\Database\Seeder;

class FormsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // factory(App\Form::class, 50)->create();
        $faker = \Faker\Factory::create();
        Form::create([
            'name'      => $faker->name,
            'file_path' => $faker->url,
            'school_id' => 1,
            // 'school_id' => factory(School::class)->create()->id,
            'user_id'   => function() use ($faker) {
                if (User::count())
                    return $faker->randomElement(User::pluck('id')->toArray());
                // else return factory(User::class)->create()->id;
            },
        ]);
    }
}
