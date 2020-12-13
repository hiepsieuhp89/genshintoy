<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Weapon extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('weapon',function(Blueprint $table){
            $table->id();
            $table->unsignedBigInteger('weapon_type_id');
            $table->foreign('weapon_type_id')->references('id')->on('weapon_type');
            $table->string('name');
            $table->integer('rarity');
            $table->integer('base_atk');
            $table->string('second_stat');
            $table->string('base_second_stat');
            $table->text('refinement_rank1');
            $table->text('refinement_rank5');
            $table->string('image');
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
