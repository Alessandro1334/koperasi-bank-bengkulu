<?php

use Illuminate\Database\Seeder;

class PejabatBerwenangsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $pejabats = factory(App\PejabatBerwenang::class, 30)->create();
    }
}
