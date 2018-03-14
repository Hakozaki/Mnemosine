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
        $BODY = '$BODY$';
        
        DB::unprepared(
                `CREATE OR REPLACE FUNCTION public.listaarmas01(
                        _id integer DEFAULT NULL::integer,
                        _nome character varying DEFAULT NULL::character varying,
                        _descricao text DEFAULT NULL::text,
                        _categoria character varying DEFAULT NULL::character varying,
                        _subcategoria character varying DEFAULT NULL::character varying,
                        _tipo character varying DEFAULT NULL::character varying,
                        _subtipo character varying DEFAULT NULL::character varying,
                        _custo numeric DEFAULT NULL::numeric,
                        _dano character varying DEFAULT NULL::character varying,
                        _incrementodecisivo character varying DEFAULT NULL::character varying,
                        _distancia character varying DEFAULT NULL::character varying,
                        _peso numeric DEFAULT NULL::numeric,
                        _tipodano character varying DEFAULT NULL::character varying)
                    RETURNS SETOF armas 
                    LANGUAGE 'plpgsql'                   
                    COST 100
                    VOLATILE 
                    ROWS 1000
                AS $BODY 
                DECLARE
                    vSQL varchar = 'SELECT * FROM ARMAS WHERE ID IS NOT NULL';	
                BEGIN 
                    IF _id IS NOT NULL THEN
                        vSql = vSql || ' AND id = ' || _id;
                    END IF;

                    IF _nome IS NOT NULL THEN		
                            vSql = vSql || ' AND nome ilike ''%' || _nome || '%''';
                    END IF;

                    IF _descricao IS NOT NULL THEN		
                            vSql = vSql || ' AND descricao ilike ''%' || _descricao || '%''';
                    END IF;

                    IF _categoria IS NOT NULL THEN		
                            vSql = vSql || ' AND categoria ilike ''%' || _categoria || '%''';
                    END IF;

                    IF _subCategoria IS NOT NULL THEN		
                            vSql = vSql || ' AND "subCategoria" ilike ''%' || _subCategoria || '%''';
                    END IF;

                    IF _tipo IS NOT NULL THEN		
                            vSql = vSql || ' AND tipo ilike ''%' || _tipo || '%''';
                    END IF;

                    IF _subTipo IS NOT NULL THEN		
                            vSql = vSql || ' AND "subTipo" ilike ''%' || _subTipo || '%''';
                    END IF;

                    IF _custo IS NOT NULL THEN		
                            vSql = vSql || ' AND custo = ' || _custo;
                    END IF;

                    IF _dano IS NOT NULL THEN		
                            vSql = vSql || ' AND dano ilike ''%' || _dano || '%''';
                    END IF;

                    IF _incrementoDecisivo IS NOT NULL THEN		
                            vSql = vSql || ' AND "incrementoDecisivo" ilike ''%' || _incrementoDecisivo || '%''';
                    END IF;

                    IF _distancia IS NOT NULL THEN		
                            vSql = vSql || ' AND distancia ilike ''%' || _distancia || '%''';
                    END IF;

                    IF _peso IS NOT NULL THEN		
                            vSql = vSql || ' AND peso = ' || _peso ;
                    END IF;

                    IF _tipoDano IS NOT NULL THEN		
                            vSql = vSql || ' AND "tipoDano" ilike ''%' || _tipoDano || '%''';
                    END IF;
			
                    RETURN QUERY EXECUTE vSql;
                END; 
            $BODY;`
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        DB::unprepared('DROP PROCEDURE IF EXISTS public.listaarmas');
    }

}
