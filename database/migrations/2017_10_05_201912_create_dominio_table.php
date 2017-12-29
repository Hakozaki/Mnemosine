<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDominioTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('dominios', function (Blueprint $table) {
            $table->increments('id');

            $table->string('nome')->nullable();            
            $table->text('poderes')->nullable();
            $table->text('descricao')->nullable();
            $table->text('observacao')->nullable();

            $table->integer('magia1')->unsigned()->nullable();
            $table->integer('magia2')->unsigned()->nullable();
            $table->integer('magia3')->unsigned()->nullable();
            $table->integer('magia4')->unsigned()->nullable();
            $table->integer('magia5')->unsigned()->nullable();
            $table->integer('magia6')->unsigned()->nullable();
            $table->integer('magia7')->unsigned()->nullable();
            $table->integer('magia8')->unsigned()->nullable();
            $table->integer('magia9')->unsigned()->nullable();

            $table->timestamps();
        });

        //Schema::table('dominios', function (Blueprint $table) {
        //    $table->foreign('magia1')->references('id')->on('magias');
        //    $table->foreign('magia2')->references('id')->on('magias');
        //    $table->foreign('magia3')->references('id')->on('magias');
        //    $table->foreign('magia4')->references('id')->on('magias');
        //    $table->foreign('magia5')->references('id')->on('magias');
        //    $table->foreign('magia6')->references('id')->on('magias');
        //    $table->foreign('magia7')->references('id')->on('magias');
        //    $table->foreign('magia8')->references('id')->on('magias');
        //    $table->foreign('magia9')->references('id')->on('magias');
        //});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::drop('dominios');
    }

}
