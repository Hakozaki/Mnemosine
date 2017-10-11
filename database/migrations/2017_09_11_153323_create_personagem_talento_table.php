<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePersonagemTalentoTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('personagem_talento', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('personagem_id')->unsigned();
            $table->integer('talento_id')->unsigned();

            $table->timestamps();
        });

        Schema::table('personagem_talento', function (Blueprint $table) {
            $table->foreign('personagem_id')->references('id')->on('personagens');
            $table->foreign('talento_id')->references('id')->on('talentos');
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
