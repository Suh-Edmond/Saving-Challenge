<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserSeeder::class);
        $this->call(SavingTypeSeeder::class);
        $this->call(SavingSeeder::class);
        $this->call(HasSavingTypeSeeder::class);
    }
}
