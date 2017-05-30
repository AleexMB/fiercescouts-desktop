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
            $table->string("name")->unique();
            $table->string("gender")->nullable();
            $table->integer("level")->nullable();
            $table->string("class")->nullable();
            $table->bigInteger("exp")->nullable();
            $table->bigInteger("gold")->nullable();
            $table->integer("hp")->nullable();
            $table->integer("p_attack")->nullable();
            $table->integer("m_attack")->nullable();
            $table->integer("p_defence")->nullable();
            $table->integer("m_defence")->nullable();
            $table->integer("speed")->nullable();
            $table->integer("weapon_right")->nullable();
            $table->integer("weapon_left")->nullable();
            $table->integer("skill_one")->nullable();
            $table->integer("skill_two")->nullable();
            $table->integer("victory_points")->nullable();
            $table->integer("chests")->nullable();
            $table->integer("chests_limit")->nullable();
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
