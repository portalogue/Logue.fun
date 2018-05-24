<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contests', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_committee')->unsigned();
            $table->string('name');
            $table->string('category');
            $table->tinyInteger('checkinTime');
            $table->string('place');
            $table->enum('type', ['Team','Individual']);
            $table->enum('format', ['Single Elimination', 'Double Elimination', 'Group']);
            $table->integer('cost')->unsigned();
            $table->datetime('deadline');
            $table->text('desc');
            $table->string('legalityPhoto')->default('legalities/default.png');
            $table->string('poster')->default('contests/deafult.png');
            $table->timestamps();

            $table->foreign('id_committee')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contests');
    }
}
