<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDokumenPendukungInvestorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dokumen_pendukung_investors', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('investor_id');
            $table->enum('ktp',['1','0']);
            $table->enum('npwp',['1','0']);
            $table->enum('form_profil_resiko_pemodal',['1','0']);
            $table->enum('bukti_setoran_investasi_awal',['1','0']);
            $table->enum('contoh_tanda_tangan',['1','0']);
            $table->enum('fatca',['1','0']);
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
        Schema::dropIfExists('dokumen_pendukung_investors');
    }
}
