<?php

namespace Database\Seeders;


use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use Illuminate\Support\Facades\DB;

class SavingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    private $saving_type;

    public function __construct()
    {
        $this->saving_type = DB::table('saving_types')->count("id");
    }
    public function run(Faker $faker)
    {
        for ($i = 0; $i < 60; $i++) {
            DB::table("savings")->insert([
                "week_number" => $faker->numberBetween(1, 50),
                "amount_deposited" => $faker->numberBetween(100, 500),
                "balance" => $faker->numberBetween(1000, 5000),
                "saving_type_id" => random_int(1, $this->saving_type)
            ]);
        }
    }
}
