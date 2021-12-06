<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();
        DB::table('users')->insert([
            'name'     => "hasib",
            'email'    => 'jimlaravel@gmail.com',
            'password' => bcrypt('password'),
            'role'     => 'master',
            'student_code' => 0000000,
            'active'   => 1,
            'verified' => 1,
        ]);
        

        // factory(User::class, 10)->states('admin')->create();
        // factory(User::class, 10)->states('accountant')->create();
        // factory(User::class, 10)->states('librarian')->create();
        // factory(User::class, 30)->states('teacher')->create();
        // factory(User::class, 200)->states('student')->create();
    }
}
