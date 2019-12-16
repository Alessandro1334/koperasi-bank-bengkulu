<?php

use Illuminate\Database\Seeder;

class PekerjaanInvestorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\PekerjaanInvestor::class, 30)->create();
    }
}
