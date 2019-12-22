<?php

use Illuminate\Database\Seeder;

class BarcodesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('barcodes')->insert([
            'nm_file'       =>  'default.jpg',
            'keterangan'    =>  'Ini adalah barcode dafault',
            'status'        =>  'aktif'
        ]);
    }
}
