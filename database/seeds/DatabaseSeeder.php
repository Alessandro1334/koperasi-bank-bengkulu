<?php

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
        // $this->call(UsersTableSeeder::class);
        $this->call(SahamInvestorsTableSeeder::class);
        $this->call(InvestorsTableSeeder::class);
        $this->call(UsersTableSeeder::class);
    }
}
