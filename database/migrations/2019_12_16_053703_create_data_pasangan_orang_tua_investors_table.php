<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDataPasanganOrangTuaInvestorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_pasangan_orang_tua_investors', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('investor_id');
            $table->string('nm_pasangan_atau_orang_tua');
            $table->string('hubungan');
            $table->string('alamat_tempat_tinggal_pasangan_atau_orang_tua');
            $table->string('telp_rumah_pasangan_atau_orang_tua')->nullable();
            $table->string('ponsel_pasangan_atau_orang_tua')->nullable();
            $table->string('pekerjaan_pasangan_atau_orang_tua')->length('50');
            $table->string('nm_perusahaan_pasangan_atau_orang_tua')->nullable();
            $table->string('alamat_perusahaan_pasangan_atau_orang_tua')->nullable();
            $table->string('kota_perusahaan_pasangan_atau_orang_tua')->nullable();
            $table->string('provinsi_perusahaan_pasangan_atau_orang_tua')->nullable();
            $table->string('kode_pos_perusahaan_pasangan_atau_orang_tua')->nullable();
            $table->string('telp_perusahaan_pasangan_atau_orang_tua')->nullable();
            $table->string('email_perusahaan_pasangan_atau_orang_tua')->nullable();
            $table->string('fax_perusahaan_pasangan_atau_orang_tua')->nullable();
            $table->enum('jabatan_pasangan_atau_orang_tua',['komisaris','direksi','manajer','staf','pemilik','pengawas']);
            $table->string('jenis_usaha_pasangan_atau_orang_tua');
            $table->string('lama_bekerja_pasangan_atau_orang_tua')->length('10');
            $table->string('penghasilan_kotor_per_tahub');
            $table->enum('sumber_penghasilan_utama_pasangan_atau_orang_tua',['gaji','hasil_usaha','warisan','dari_orang_tua/anak','hibah','dari_suami/istri','hasil_investasi','lainnya'])->nullable();
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
        Schema::dropIfExists('data_pasangan_orang_tua_investors');
    }
}
