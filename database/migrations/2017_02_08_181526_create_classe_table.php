<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClasseTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('classes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome')->nullable();
            $table->string('tendencia')->nullable();
            $table->string('dv')->nullable();
            $table->string('pontosPericiaNivel1')->nullable();
            $table->string('pontosPericiaPorNivel')->nullable();
            $table->text('descricao')->nullable();        
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::drop('classes');
    }
}
