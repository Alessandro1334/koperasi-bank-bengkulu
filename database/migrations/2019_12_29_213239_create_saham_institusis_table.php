<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSahamInstitusisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('saham_institusis', function (Blueprint $table) {
            $table->increments('id');
            $table->string('no_sk3s')->length('30');
            $table->unsignedInteger('institusi_id');
            $table->string('seri_spmpkop')->length(10);
            $table->unsignedInteger('seri_formulir')->length(11);
            $table->string('jumlah_saham')->length(30);
            $table->text('terbilang_saham');
            $table->enum('jenis_mata_uang',['idr','usd']);
            $table->string('pembayaran_no_rek')->length(40);
            $table->string('pembayaran_nm_rek')->length(100);
            $table->string('pembayaran_nm_bank')->length(100);
            $table->string('institusi_id_lama')->nullable();
            $table->string('no_sk3s_lama')->nullable();
            $table->string('perubahan_ke')->default('0');
            $table->enum('status_verifikasi',['0','1','2'])->default('0');
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
        Schema::dropIfExists('saham_institusis');
    }
}
