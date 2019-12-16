<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePekerjaanInvestorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pekerjaan_investors', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('investor_id');
            $table->string('pekerjaan')->length('50');
            $table->string('nm_perusahaan');
            $table->string('alamat_perusahaan');
            $table->string('kota_perusahaan');
            $table->string('provinsi_perusahaan');
            $table->string('kode_pos_perusahaan')->nullable();
            $table->string('telp_perusahaan')->nullable();
            $table->string('email_perusahaan')->nullable();
            $table->string('fax_perusahaan')->nullable();
            $table->enum('jabatan',['komisaris','direksi','manajer','staf','pemilik','pengawas']);
            $table->string('jenis_usaha');
            $table->string('lama_bekerja')->length('10');
            $table->enum('sumber_penghasilan_utama',['gaji','hasil_usaha','warisan','dari_orang_tua/anak','hibah','dari_suami/istri','hasil_investasi','lainnya'])->nullable();
            $table->bigInteger('penghasilan_lain');
            $table->enum('sumber_penghasilan_lainnya',['gaji','hasil_usaha','warisan','dari_orang_tua/anak','hibah','dari_suami/istri','hasil_investasi','lainnya'])->nullable();
            $table->enum('sumber_dana_investasi',['gaji','hasil_usaha','warisan','dari_orang_tua/anak','hibah','dari_suami/istri','hasil_investasi','lainnya'])->nullable();
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
        Schema::dropIfExists('pekerjaan_investors');
    }
}
