<?php

use Illuminate\Database\Seeder;

class KetuaKoperasisTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $ketua = factory(App\KetuaKoperasi::class, 30)->create();
    }
}
