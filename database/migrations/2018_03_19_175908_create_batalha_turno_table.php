<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBatalhaTurnoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('batalha_turnos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('batalha_id')->unsigned;
            $table->integer('rodada');
            $table->integer('turno');
            $table->integer('acao');
            $table->integer('jogador_origem')->unsigned;
            $table->integer('jogador_destino')->unsigned;
            $table->string('efeito')->nullable();
            $table->integer('duracao_efeito')->nullable();
            $table->integer('efeito_ativo')->nullable()->default(0);
            $table->integer('dano')->nullable()->default(0);
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
        Schema::dropIfExists('batalha_turnos');
    }
}
