<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransResellersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trans_resellers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('atas_nama');
            $table->string('alamat');
            $table->integer('tr_qty');
            $table->string('status');
            $table->timestamps();
        });

        Schema::table('trans_resellers', function (Blueprint $table) {
            $table->foreignId('id_u')->constrained('users')
                ->onDelete('cascade');
        });
        
        Schema::table('trans_resellers', function (Blueprint $table) {
            $table->foreignId('id_p')->constrained('produks')
                ->onDelete('cascade');
        });
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('trans_resellers');
    }
}
