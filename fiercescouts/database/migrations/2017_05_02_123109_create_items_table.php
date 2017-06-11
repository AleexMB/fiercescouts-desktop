<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string("name")->nullable();
            $table->string("rarity")->nullable();
            $table->integer("hp")->nullable();
            $table->integer("p_attack")->nullable();
            $table->integer("m_attack")->nullable();
            $table->integer("p_defence")->nullable();
            $table->integer("m_defence")->nullable();
            $table->integer("speed")->nullable();
            $table->integer("itemlv")->nullable();
            $table->integer("img")->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('items');
    }
}
