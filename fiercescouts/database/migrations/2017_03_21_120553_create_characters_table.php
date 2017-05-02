<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCharactersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('characters', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string("name");
            $table->integer("gender");
            $table->string("class");
            $table->bigInteger("exp");
            $table->bigInteger("gold");
            $table->integer("hp");
            $table->integer("p_attack");
            $table->integer("m_attack");
            $table->integer("p_defense");
            $table->integer("m_defense");
            $table->integer("speed");
            $table->integer("weapon_right");
            $table->integer("weapon_left");
            $table->integer("victory_points");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('characters');
    }
}
