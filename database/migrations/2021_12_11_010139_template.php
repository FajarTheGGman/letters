<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Template extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('template', function(Blueprint $table){
            $table->id();
            $table->string('creator');
            $table->string('title');
            $table->string('desc');
            $table->string('banner');
            $table->string('body');
            $table->string('address');
            $table->string('tone_title');
            $table->string('date');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExsist('template');
    }
}
