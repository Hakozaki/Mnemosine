<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTalentosTable extends Migration {

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
            $table->text('descricao')->nullable();
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
