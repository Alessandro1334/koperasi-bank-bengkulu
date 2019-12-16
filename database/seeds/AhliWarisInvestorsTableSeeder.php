<?php

use Illuminate\Database\Seeder;

class AhliWarisInvestorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $ahliwarisinvestors = factory(App\AhliWarisInvestor::class, 30)->create();
    }
}
