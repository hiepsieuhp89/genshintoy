<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PlayablecharTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('playablechar',function(Blueprint $table){
            $table->id();
            $table->string('name');
            $table->string('nickname')->nullable();
            $table->string('sex');
            $table->integer('rarity');
            $table->unsignedBigInteger('weapon_type_id');
            $table->foreign('weapon_type_id')->references('id')->on('weapon_type');
            $table->unsignedBigInteger('element_id');
            $table->foreign('element_id')->references('id')->on('element');
            $table->integer('nation_id');
            $table->string('icon');
            $table->text('url2_to_craw')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
