<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CharacterInformationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('character_information',function(Blueprint $table){
            $table->id();
            $table->unsignedBigInteger('character_id');
            $table->foreign('character_id')->references('id')->on('playablechar');
            $table->string('full_name')->nullable();
            $table->string('birthday')->nullable();
            $table->string('special_dish')->nullable();
            $table->text('card_image')->nullable();
            $table->text('portrait_image')->nullable();
            $table->text('ingame_image')->nullable();
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
