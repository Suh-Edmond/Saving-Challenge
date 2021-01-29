<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Generator as Faker;

class ChallengeTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        DB::table("challenge_types")->insert([
            "challenge_type" => "2000 Start Challenge",
            "description" => "This is a 2000Frs Start Challenge",
        ]);

        DB::table("challenge_types")->insert([
            "challenge_type" => "5000 Start Challenge",
            "description" => "This is a 5000Frs Start Challenge",
        ]);

        DB::table("challenge_types")->insert([
            "challenge_type" => "7000 Start Challenge",
            "description" => "This is a 7000Frs Start Challenge",
        ]);
        DB::table("challenge_types")->insert([
            "challenge_type" => "500 Start Challenge",
            "description" => "This is a 500Frs Start Challenge",
        ]);
        DB::table("challenge_types")->insert([
            "challenge_type" => "1000 Start Challenge",
            "description" => "This is a 1000Frs Start Challenge",
        ]);
        DB::table("challenge_types")->insert([
            "challenge_type" => "3000 Start Challenge",
            "description" => "This is a 3000Frs Start Challenge",
        ]);
    }
}
