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
            $table->string("gender");
            $table->string("class");
            $table->bigInteger("exp");
            $table->bigInteger("gold");
            $table->integer("hp")->nullable();
            $table->integer("p_attack")->nullable();
            $table->integer("m_attack")->nullable();
            $table->integer("p_defence")->nullable();
            $table->integer("m_defence")->nullable();
            $table->integer("speed")->nullable();
            $table->integer("weapon_right")->nullable();
            $table->integer("weapon_left")->nullable();
            $table->integer("victory_points")->nullable();
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
