<?php

use Illuminate\Database\Seeder;

class DataPasanganOrangTuaInvestorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\DataPasanganOrangTuaInvestor::class, 30)->create();
    }
}
