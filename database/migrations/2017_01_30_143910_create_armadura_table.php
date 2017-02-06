<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArmaduraTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('armaduras', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome')->nullable();
            $table->text('descricao')->nullable();
            $table->string('categoria')->nullable();            
            $table->decimal('custo', 5, 2)->nullable()->default(0);
            $table->string('bonus')->nullable();
            $table->string('bonusDestreza')->nullable();
            $table->string('falhaArmadura')->nullable();
            $table->string('falhaMagia')->nullable();
            $table->string('deslocamento9m')->nullable();
            $table->string('deslocamento6m')->nullable();                        
            $table->decimal('peso', 5, 2)->nullable()->default(0);            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::drop('armaduras');
    }

}
