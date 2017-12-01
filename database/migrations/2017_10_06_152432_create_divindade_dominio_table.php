<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDivindadeDominioTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('divindade_dominio', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('divindade_id')->unsigned();
            $table->integer('dominio_id')->unsigned();

            $table->timestamps();
        });

        Schema::table('divindade_diminio', function (Blueprint $table) {
            $table->foreign('divindade_id')->references('id')->on('divindades');
            $table->foreign('dominio_id')->references('id')->on('dominios');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::drop('divindade_dominio');
    }

}
