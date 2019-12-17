<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePersetujuansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('persetujuans', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('investor_id');
            $table->string('nm_agen_pemasaran');
            $table->enum('tanda_tangan_agen_pemasaran',['1','0']);
            $table->date('tanggal_agen_pemasaran');
            $table->string('nm_pejabat_berwenang');
            $table->enum('status_persetujuan',['disetujui','tidak_disetujui']);
            $table->enum('tanda_tangan_pejabat_berwenang',['1','0']);
            $table->date('tanggal_pejabat_berwenang');
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
        Schema::dropIfExists('persetujuans');
    }
}
