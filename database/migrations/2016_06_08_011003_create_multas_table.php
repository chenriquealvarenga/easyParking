<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMultasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('multas', function (Blueprint $table) {
            $table->increments('id')->unique();
            $table->integer('vigia')->references('id')->on('vigias');
            $table->integer('usuario')->references('id')->on('users')->onDelete('cascade');
            $table->integer('violacao')->references('id')->on('violacaos');
            $table->date('datainicio');
            $table->date('datafim');            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop("multas");
    }
}
