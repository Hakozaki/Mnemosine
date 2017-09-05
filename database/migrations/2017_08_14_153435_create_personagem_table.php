<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePersonagemTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('pergonagens', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome');
            $table->integer('jogador_id')->unsigned;
            $table->integer('pv')->unsigned;

            $table->integer('forca')->unsigned;
            $table->integer('destreza')->unsigned;
            $table->integer('constituicao')->unsigned;
            $table->integer('inteligencia')->unsigned;
            $table->integer('sabedoria')->unsigned;
            $table->integer('carisma')->unsigned;
            $table->integer('modForca')->unsigned;
            $table->integer('modDestreza')->unsigned;
            $table->integer('modConstituicao')->unsigned;
            $table->integer('modInteligencia')->unsigned;
            $table->integer('modSabedoria')->unsigned;
            $table->integer('modCarisma')->unsigned;

            $table->integer('fortitude')->unsigned;
            $table->integer('reflexos')->unsigned;
            $table->integer('vontade')->unsigned;
            $table->integer('modFortitude')->unsigned;
            $table->integer('modReflexos')->unsigned;
            $table->integer('modVontade')->unsigned;
            $table->integer('habFortitude')->unsigned;
            $table->integer('habReflexos')->unsigned;
            $table->integer('habVontade')->unsigned;
            $table->integer('outrosFortitude')->unsigned;
            $table->integer('outrosReflexos')->unsigned;
            $table->integer('outrosVontade')->unsigned;
            
            $table->integer('ca')->unsigned;
            $table->integer('armaduraCa')->unsigned;
            $table->integer('escudoCa')->unsigned;
            $table->integer('destrezaCa')->unsigned;
            $table->integer('tamanhoCa')->unsigned;
            $table->integer('armaduraNaturalCa')->unsigned;
            $table->integer('deflexaoCa')->unsigned;

            $table->timestamps();
        });

        Schema::table('pergonagens', function (Blueprint $table) {
            $table->foreign('jogador_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::drop('personagens');
    }

}
