<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddPolymorphicFieldsInUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->integer('userable_id')->unique();
            $table->string('userable_type');
            $table->string('rg','35')->unique();;
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropUnique('users_userable_id_unique');
            $table->dropUnique('users_rg_unique');
            $table->dropColumn(['userable_id','userable_type','rg']);
            
            
        });
    }
}
