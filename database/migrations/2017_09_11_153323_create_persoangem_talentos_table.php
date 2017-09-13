<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePersoangemTalentosTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('personagem_talento', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('jogador_id')->unsigned;
            $table->integer('talento_id')->unsigned;

            $table->timestamps();
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
