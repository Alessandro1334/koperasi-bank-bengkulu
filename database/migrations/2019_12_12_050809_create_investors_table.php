<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInvestorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('investors', function (Blueprint $table) {
            $table->increments('id');
            $table->string('no_register')->length('20');
            $table->string('nm_investor');
            $table->enum('jenis_rekening',['perorangan','nonperorangan']);
            $table->string('profil_resiko_nasabah')->nullable();
            $table->string('no_cif')->length('50');
            $table->unsignedInteger('staf_pemasaran_id')->nullable();
            $table->enum('jenis_kelamin',['L','P']);
            $table->string('no_ktp')->length(20);
            $table->string('tgl_kadaluarsa_ktp');
            $table->string('no_npwp')->length('25');
            $table->date('tgl_registrasi_npwp');
            $table->string('tempat_lahir')->length('30');
            $table->date('tanggal_lahir');
            $table->enum('status_perkawinan',['menikah','belum_menikah','janda/duda']);
            $table->enum('kewarganegaraan',['wni','wna']);
            $table->string('alamat_ktp');
            $table->string('rt_ktp')->length('5');
            $table->string('rw_ktp')->length('5');
            $table->string('kecamatan_ktp')->length('30');
            $table->string('kelurahan_ktp')->length('30');
            $table->string('kota_ktp')->length('30');
            $table->string('provinsi_ktp')->length('30');
            $table->string('kode_pos_ktp')->length('20');
            $table->string('alamat_tempat_tinggal');
            $table->string('rt_tempat_tinggal')->length('5');
            $table->string('rw_tempat_tinggal')->length('5');
            $table->string('kecamatan_tempat_tinggal')->length('30');
            $table->string('kelurahan_tempat_tinggal')->length('30');
            $table->string('kota_tempat_tinggal')->length('30');
            $table->string('provinsi_tempat_tinggal')->length('30');
            $table->string('kode_pos_tempat_tinggal')->length('20')->nullable();
            $table->string('telp_rumah')->length('20')->nullable();
            $table->string('ponsel')->length('20')->nullable();
            $table->string('lama_menempati')->length('10');
            $table->enum('status_rumah_tinggal',['milik_sendiri','sewa','lainnya']);
            $table->enum('agama',['islam','protestan','katolik','hindu','buddha','konghucu','lainnya']);
            $table->enum('pendidikan_terakhir',['sma','d3','s1','s2','s3','lainnya']);
            $table->string('nm_gadis_ibu_kandung');
            $table->string('emergency_kontak')->nullable();
            $table->string('jumlah_tanggungan')->length('20')->nullable();
            $table->string('alamat_surat_menyurat_ktp')->nullable();
            $table->string('alamat_surat_menyurat_tempat_tinggal')->nullable();
            $table->string('alamat_surat_menyurat_lainnya')->nullable();
            $table->string('pengiriman_konfirmasi_melalui_email')->nullable();
            $table->string('pengiriman_konfirmasi_melalui_fax')->nullable();
            $table->string('pengiriman_konfirmasi_melalui_alamat_surat_menyurat')->nullable();
            $table->string('tujuan_investasi');
            $table->enum('status_verifikasi',['0','1','2'])->defauled('0');
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
        Schema::dropIfExists('investors');
    }
}
