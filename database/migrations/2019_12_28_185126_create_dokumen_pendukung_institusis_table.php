<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDokumenPendukungInstitusisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dokumen_pendukung_institusis', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('institusi_id');
            $table->enum('kelengkapan_dokumen',['ada','tidak']);
            $table->enum('profil_resiko',['ada','tidak']);
            $table->enum('bukti_setoran',['ada','tidak']);
            $table->enum('ttd_penerima_kuasa',['ada','tidak']);
            $table->enum('fatca',['ada','tidak']);
            $table->enum('persetujuan',['ada','tidak']);
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
        Schema::dropIfExists('dokumen_pendukung_institusis');
    }
}
