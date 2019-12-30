<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRekeningInstitusisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rekening_institusis', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nm_investor');
            $table->string('no_register');
            $table->string('no_cif')->nullable();
            $table->unsignedInteger('agen_pemasaran_id');
            $table->unsignedInteger('pejabat_berwenang_1');
            $table->unsignedInteger('pejabat_berwenang_2')->nullable();
            $table->string('nm_institusi');
            $table->string('kota_institusi');
            $table->string('provinsi_institusi');
            $table->string('negara_institusi');
            $table->string('kode_pos_institusi');
            $table->string('email_kantor')->nullable();
            $table->string('telephone_kantor');
            $table->enum('domisili',['lokal','asing']);
            $table->enum('tipe_perusahaan',['pt','yayasan','dana_pensiun','asuransi','keuangan','efek','koperasi','lainnya']);
            $table->enum('karakteristik',['bumn','swasta','pma','bumd','keluarga','patungan','afiliasi','lainnya']);
            $table->string('bidang_usaha');
            $table->string('no_akta_pendirian');
            $table->date('tanggal_akta_pendirian');
            $table->string('no_akta_perubahan_terakhir')->nullable();
            $table->string('tanggal_akta_perubahan_terakhir')->nullable();
            $table->string('no_npwp')->nullable();
            $table->date('tgl_registrasi_npwp')->nullable();
            $table->string('no_siup')->nullable();
            $table->date('tgl_kadaluarsa_siup')->nullable();
            $table->string('no_skdp')->nullable();
            $table->date('tgl_kadaluarsa_skdp')->nullable();
            $table->string('no_tdp')->nullable();
            $table->date('tanggal_kadaluarsa_tdp')->nullable();
            $table->string('no_izin_pma')->nullable();
            $table->enum('status_verifikasi',['1','0'])->default('0');
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
        Schema::dropIfExists('rekening_institusis');
    }
}
