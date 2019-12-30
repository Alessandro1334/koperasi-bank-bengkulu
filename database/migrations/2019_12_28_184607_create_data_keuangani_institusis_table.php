<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDataKeuanganiInstitusisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_keuangani_institusis', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('institusi_id');
            $table->string('aset_keuangan_tahun_1')->nullable();
            $table->string('aset_keuangan_tahun_2')->nullable();
            $table->string('aset_keuangan_tahun_3')->nullable();
            $table->string('laba_keuangan_tahun_1')->nullable();
            $table->string('laba_keuangan_tahun_2')->nullable();
            $table->string('laba_keuangan_tahun_3')->nullable();
            $table->enum('sumber_dana',['hasil_usaha','dana_pensiun','bunga_simpanan','hasil_investasi','lainnya']);
            $table->enum('tujuan_investasi',['kenaikan_harga','investasi','spekulasi','penghasilan','lainnya']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('data_keuangani_institusis');
    }
}
