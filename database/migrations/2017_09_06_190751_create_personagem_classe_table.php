<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePersonagemClasseTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('personagem_classe', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('personagem_id')->unsigned();
            $table->integer('classe_id')->unsigned();
            $table->integer('nivel')->nullable();

            $table->timestamps();
        });

        Schema::table('personagem_classe', function (Blueprint $table) {
            $table->foreign('personagem_id')->references('id')->on('personagens');
            $table->foreign('classe_id')->references('id')->on('classes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::drop('personagem_classe');
    }

}
