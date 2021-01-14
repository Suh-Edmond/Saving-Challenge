<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use Illuminate\Support\Facades\DB;

class SavingTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i = 0; $i < 20; $i++) {
            DB::table("saving_types")->insert([
                "challenge_type" => $faker->creditCardType,
                "number_of_weeks" => random_int(1, 52),
                "total_amount" => $faker->numberBetween(100000, 500000)
            ]);
        }
    }
}
