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
        Schema::create('personagens', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome');
            $table->integer('idade')->nullable()->default(0);
            $table->string('sexo')->nullable();
            $table->string('tendencia')->nullable();
            $table->string('alinhamento')->nullable();
            $table->string('tamanho')->nullable();
            $table->integer('altura')->nullable()->default(0);
            $table->integer('peso')->nullable()->default(0);
            $table->string('olhos')->nullable();
            $table->string('cabelo')->nullable();
            $table->string('pele')->nullable();
            $table->text('observacao')->nullable();

            $table->string('reducaoDano')->nullable();
            $table->integer('resistenciaMagica')->nullable()->default(0);
            $table->string('deslocamento')->nullable();

            $table->integer('jogador_id')->unsigned;
            $table->integer('raca_id')->unsigned()->nullable();
            $table->integer('divindade_id')->unsigned()->nullable();

            $table->integer('pv')->nullable()->default(0);

            $table->integer('forca')->nullable()->default(0);
            $table->integer('destreza')->nullable()->default(0);
            $table->integer('constituicao')->nullable()->default(0);
            $table->integer('inteligencia')->nullable()->default(0);
            $table->integer('sabedoria')->nullable()->default(0);
            $table->integer('carisma')->nullable()->default(0);
            $table->integer('modForca')->nullable()->default(0);
            $table->integer('modDestreza')->nullable()->default(0);
            $table->integer('modConstituicao')->nullable()->default(0);
            $table->integer('modInteligencia')->nullable()->default(0);
            $table->integer('modSabedoria')->nullable()->default(0);
            $table->integer('modCarisma')->nullable()->default(0);

            $table->integer('fortitude')->nullable()->default(0);
            $table->integer('reflexo')->nullable()->default(0);
            $table->integer('vontade')->nullable()->default(0);
            $table->integer('modFortitude')->nullable()->default(0);
            $table->integer('modReflexo')->nullable()->default(0);
            $table->integer('modVontade')->nullable()->default(0);
            $table->integer('habFortitude')->nullable()->default(0);
            $table->integer('habReflexo')->nullable()->default(0);
            $table->integer('habVontade')->nullable()->default(0);
            $table->integer('magicoFortitude')->nullable()->default(0);
            $table->integer('magicoReflexo')->nullable()->default(0);
            $table->integer('magicoVontade')->nullable()->default(0);
            $table->integer('outrosFortitude')->nullable()->default(0);
            $table->integer('outrosReflexo')->nullable()->default(0);
            $table->integer('outrosVontade')->nullable()->default(0);

            $table->integer('ca')->nullable()->default(0);
            $table->integer('armaduraCa')->nullable()->default(0);
            $table->integer('escudoCa')->nullable()->default(0);
            $table->integer('destrezaCa')->nullable()->default(0);
            $table->integer('tamanhoCa')->nullable()->default(0);
            $table->integer('armaduraNaturalCa')->nullable()->default(0);
            $table->integer('deflexaoCa')->nullable()->default(0);
            $table->integer('outrosCa')->nullable()->default(0);

            $table->integer('iniciativa')->nullable()->default(0);
            $table->integer('modDestrezaIniciativa')->nullable()->default(0);
            $table->integer('outrosIniciativa')->nullable()->default(0);

            $table->integer('toque')->nullable()->default(0);
            $table->integer('surpresa')->nullable()->default(0);
            $table->integer('bba')->nullable()->default(0);

            $table->integer('agarrar')->nullable()->default(0);
            $table->integer('modAgarrar')->nullable()->default(0);
            $table->integer('forcaAgarrar')->nullable()->default(0);
            $table->integer('tamanhoAgarrar')->nullable()->default(0);
            $table->integer('outrosAgarrar')->nullable()->default(0);

            $table->timestamps();
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
