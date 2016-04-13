<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVagasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('vagas', function (Blueprint $table) {
            $table->string('codigo', 10)->unique();
            $table->enum('area', ['decom', 'principal', 'entrada', 'funcionario']);
            $table->enum('status', ['interditada', 'livre', 'ocupada']);
            $table->double('latitude', 11, 8);
            $table->double('longitude', 11, 8);            
            $table->primary('codigo');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('vagas');
    }
}
