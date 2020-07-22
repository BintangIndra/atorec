<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLogAdminsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('log_admins', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('id_u');
            $table->enum('nama_db',['trans_g','trans_r']);
            $table->integer('id_tg');
            $table->enum('action',['create','update','delete']);
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
        Schema::dropIfExists('log_admins');
    }
}
