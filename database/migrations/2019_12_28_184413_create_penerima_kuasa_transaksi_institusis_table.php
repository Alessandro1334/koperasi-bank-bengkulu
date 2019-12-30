<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePenerimaKuasaTransaksiInstitusisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('penerima_kuasa_transaksi_institusis', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('institusi_id');
            $table->string('nm_kuasa');
            $table->string('no_identitas');
            $table->date('tgl_kadalursa_identitas');
            $table->string('jabatan');
            $table->string('telephone');
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
        Schema::dropIfExists('penerima_kuasa_transaksi_institusis');
    }
}
