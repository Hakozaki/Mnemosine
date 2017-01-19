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
        Schema::create('magias', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome');
            $table->text('descricao')->nullable();
            $table->string('escola')->nullable();
            $table->string('subEscola')->nullable();
            $table->string('descritor')->nullable();
            $table->boolean('componenteVisual')->nullable();
            $table->boolean('componenteGestual')->nullable();
            $table->boolean('componenteMaterial')->nullable();
            $table->boolean('componenteFoco')->nullable();
            $table->boolean('componenteFocoDivino')->nullable();
            $table->boolean('componenteXP')->nullable();
            $table->string('componenteDescricao')->nullable();
            $table->string('tempoExecucao')->nullable();
            $table->string('nivel')->nullable();
            $table->string('alcance')->nullable();
            $table->string('alvo')->nullable();
            $table->string('efeito')->nullable();
            $table->string('area')->nullable();
            $table->string('testeResistencia')->nullable();
            $table->string('resistenciaMagia')->nullable();
            $table->string('duracao')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::drop('magias');
    }

}
