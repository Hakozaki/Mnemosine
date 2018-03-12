<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateListaArmasProcedure extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        DB::unprepared(
                'CREATE OR REPLACE FUNCTION listaArmas (text, text) '.
                'RETURNS text AS $$ '.
                'BEGIN '.
                'RETURN $1 || " " || $2; '.
                'END; '.
                '$$ LANGUAGE plpgsql; '
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        DB::unprepared('DROP PROCEDURE IF EXISTS SOMAR');
    }

}
