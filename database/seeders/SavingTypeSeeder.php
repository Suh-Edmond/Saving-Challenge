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
    private $challenge_type;
    public function __construct()
    {
        $this->challenge_type = DB::table('challenge_types')->count("id");
    }
    public function run(Faker $faker)
    {

        DB::table("saving_types")->insert([
            "challenge_type_id" => 1,
            "number_of_weeks" => 52,
            "amount_payable" => 2000,
            "total_amount" => 2756000
        ]);
    }
}
