<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAhliWarisInvestorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ahli_waris_investors', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('investor_id')->randomNumber();
            $table->string('nm_ahli_waris')->length(150);
            $table->string('hubungan_ahli_waris')->length(100);
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
        Schema::dropIfExists('ahli_waris_investors');
    }
}
