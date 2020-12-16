<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('roles', function (Blueprint $table) {
            $table->tinyIncrements('id');
            $table->string('code', 30)->unique();
            $table->smallInteger('position')->unsigned();
            $table->tinyInteger('parent_id')->unsigned()->nullable();
            $table->foreign('parent_id')->references('id')->on('roles');
        });

        Schema::create('profile_role', function(Blueprint $table) {
            $table->integerIncrements('id');
            $table->tinyInteger('role_id')->unsigned();
            $table->foreign('role_id')->references('id')->on('roles');
            $table->integer('profile_id')->unsigned();
            $table->foreign('profile_id')->references('id')->on('profiles');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('roles');
    }
}
