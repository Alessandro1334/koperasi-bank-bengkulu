<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePemegangSahamInstitusisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pemegang_saham_institusis', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('institusi_id');
            $table->string('nm_pemegang_saham');
            $table->string('komposisi_pemegang_saham');
            $table->date('tanggal_pernyataan');
            $table->string('yang_menyatakan');
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
        Schema::dropIfExists('pemegang_saham_institusis');
    }
}
