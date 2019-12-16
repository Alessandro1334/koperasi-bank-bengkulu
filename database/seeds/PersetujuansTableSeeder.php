<?php

use Illuminate\Database\Seeder;

class PersetujuansTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $persetujuans = factory(App\Persetujuan::class, 30)->create();
    }
}
