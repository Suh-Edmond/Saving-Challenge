<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i = 0; $i < 10; $i++) {
            DB::table("users")->insert([
                "first_name" => $faker->firstName,
                "last_name" => $faker->lastName,
                "email" => $faker->email,
                "telephone" => $faker->phoneNumber,
                "password" => $faker->password(8),
                "confirm_password" => $faker->password(8)
            ]);
        }
    }
}
