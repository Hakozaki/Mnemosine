<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBatalhaJogadorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('batalha_jogador', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('batalha_id')->unsigned;
            $table->integer('jogador_id')->unsigned;
            $table->integer('pv')->nullable();
            $table->integer('iniciativa')->nullable();
            $table->integer('posicao')->nullable();
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
        Schema::dropIfExists('batalha_jogador');
    }
}
