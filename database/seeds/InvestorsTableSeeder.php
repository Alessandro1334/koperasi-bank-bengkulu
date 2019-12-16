<?php

use Illuminate\Database\Seeder;

class InvestorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = factory(App\Investor::class, 30)->create();
    }
}
