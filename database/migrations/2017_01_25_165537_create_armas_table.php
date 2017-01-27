<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArmasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('armas', function (Blueprint $table) {
            $table->increments('id');            
            $table->string('nome')->nullable();
            $table->text('descricao')->nullable();
            $table->string('categoria')->nullable();
            $table->string('subCategoria')->nullable();
            $table->string('tipo')->nullable();
            $table->string('subTipo')->nullable();
            $table->decimal('custo',5,2)->nullable()->default(0);            
            $table->string('dano')->nullable();
            $table->string('incrementoDecisivo')->nullable();
            $table->string('distancia')->nullable();
            $table->decimal('peso',5,2)->nullable()->default(0);
            $table->string('tipoDano')->nullable();                        
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
        Schema::drop('armas');
    }
}
