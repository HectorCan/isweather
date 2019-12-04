<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CTblSensors extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('temperature', function (Blueprint $t) {
          $t->increments('id');
          $t->string('date');
          $t->integer('value');
          $t->timestamps();
        });

        Schema::create('humidity', function (Blueprint $t) {
          $t->increments('id');
          $t->string('date');
          $t->integer('value');
          $t->timestamps();
        });

        Schema::create('pressure', function (Blueprint $t) {
          $t->increments('id');
          $t->string('date');
          $t->integer('value');
          $t->timestamps();
        });

        Schema::create('light', function (Blueprint $t) {
          $t->increments('id');
          $t->string('date');
          $t->integer('value');
          $t->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('temperature');
        Schema::dropIfExists('humidity');
        Schema::dropIfExists('pressure');
        Schema::dropIfExists('light');
    }
}
