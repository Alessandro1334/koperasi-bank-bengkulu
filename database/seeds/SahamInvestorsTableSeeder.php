<?php

use Illuminate\Database\Seeder;

class SahamInvestorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sahams = factory(App\SahamInvestor::class, 30)->create();
    }
}
