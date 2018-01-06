<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDivindadeTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('divindades', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome')->nullable();
            $table->string('panteao')->nullable();
            $table->string('tendencia')->nullable();
            $table->string('alinhamento')->nullable();
            $table->text('descricao')->nullable();
            $table->text('observacao')->nullable();
            $table->string('aspectos')->nullable();
            $table->text('dogma')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::drop('divindades');
    }

}
