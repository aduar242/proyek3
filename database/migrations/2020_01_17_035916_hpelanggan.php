<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


class Hpelanggan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('history_p', function (Blueprint $table) {
            $table->increments('idh');
            $table->integer('id');
            $table->integer('id_paket');
            $table->string('masa_aktif');
            $table->string('masa_kadaluwarsa');
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
        Schema::dropIfExists('history_p'); 
    }
}
