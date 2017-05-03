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
            $table->string("name");
            $table->string("rarity");
            $table->integer("hp")->nullable();
            $table->integer("p_attack")->nullable();
            $table->integer("m_attack")->nullable();
            $table->integer("p_defense")->nullable();
            $table->integer("m_defense")->nullable();
            $table->integer("speed")->nullable();
            $table->integer("itemlv")->nullable();
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
