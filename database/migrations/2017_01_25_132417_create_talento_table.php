<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTalentoTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('talentos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome');
            $table->string('tipo')->nullable();
            $table->string('talentoHabilidade')->nullable();
            $table->text('descricao')->nullable();
            $table->text('observacao')->nullable();
            $table->text('preRequisito')->nullable();
            $table->text('beneficio')->nullable();
            $table->text('normal')->nullable();
            $table->text('especial')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::drop('talentos');
    }

}
