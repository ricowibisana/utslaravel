<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBajuTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('baju', function (Blueprint $table) {

           $table->bigIncrements('id');
            $table->string('nama', 50);
            $table->string('harga', 50);
            $table->integer('jenis')->unsigned();
            $table->string('foto', 50);
            $table->timestamps();

            $table->foreign('jenis')->references('id_jen')->on('jenis')
                    ->onDelete('restrict')
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
        Schema::dropIfExists('baju');
    }
}
