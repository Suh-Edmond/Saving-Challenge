<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class HasSavingTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    private $user_id;
    private $saving_type;

    public function __construct()
    {
        $this->user_id = DB::table('users')->count("id");
        $this->saving_type = DB::table('saving_types')->count("id");
    }
    public function run(Faker $faker)
    {
        for ($i = 0; $i < 30; $i++) {
            DB::table("has_savings")->insert([
                "user_id" => random_int(1, $this->user_id),
                "saving_type_id" => random_int(1, $this->saving_type)
            ]);
        }
    }
}
