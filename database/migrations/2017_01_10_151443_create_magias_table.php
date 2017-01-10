<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMagiasTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('magia', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome');
            $table->string('descricao');
            $table->string('escola');
            $table->string('descritor');
            $table->string('componentes');
            $table->string('tempoExecucao');
            $table->string('nivel');
            $table->string('alcance');
            $table->string('testeResistencia');
            $table->string('resistenciaMagia');
            $table->string('duracao');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::drop('magia');
    }

}
