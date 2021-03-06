<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSusunanDireksiInstitusisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('susunan_direksi_institusis', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('institusi_id');
            $table->string('nm_direksi');
            $table->string('no_identitas');
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
        Schema::dropIfExists('susunan_direksi_institusis');
    }
}
