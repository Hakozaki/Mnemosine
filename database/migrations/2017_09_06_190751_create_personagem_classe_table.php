<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePersonagemClasseTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::create('pergonagem_classe', function (Blueprint $table) {
            $table->increments('id');
                        
            $table->integer('jogador_id')->unsigned;
            $table->integer('classe_id')->unsigned;
            
            $table->timestamps();
        });

        Schema::table('pergonagens', function (Blueprint $table) {
            $table->foreign('jogador_id')->references('id')->on('users');            
            $table->foreign('classe_id')->references('id')->on('classes');            
        });
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('personagem_classe');
    }
}
