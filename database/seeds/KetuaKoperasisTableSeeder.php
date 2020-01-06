<?php

use Illuminate\Database\Seeder;
use App\KetuaKoperasi;

class KetuaKoperasisTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $ketua = factory(App\KetuaKoperasi::class, 30)->create();
        $ketua = [
            'nm_ketua_koperasi' =>  'Ketua Koperasi',
            'status'            =>  '1',
        ];

        KetuaKoperasi::insert($ketua);
    }
}
