<?php

use Illuminate\Database\Seeder;

class DokumenPendukungInvestorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\DokumenPendukungInvestor::class, 30)->create();
    }
}
