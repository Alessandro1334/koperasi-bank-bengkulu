<?php

use Illuminate\Database\Seeder;

class AgenPemasaransTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $agen = factory(App\AgenPemasaran::class, 30)->create();
    }
}
