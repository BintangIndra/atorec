<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransGuestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trans_guests', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('atas_nama');
            $table->string('alamat');
            $table->integer('t_qty');
            $table->timestamps();
        });

        Schema::table('trans_guests', function (Blueprint $table) {
            $table->foreignId('id_p')->constrained('produks')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('trans_guests');
    }
}
