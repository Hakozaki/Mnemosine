<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ExtArmadura extends Model {

    /**
     * Função que retorna uma lista de Categorias.     
     * @return Array Lista de Categorias.
     */
    public static function categoria() {
        return ["leve" => "Armaduras Leves",
            "media" => "Armaduras Médias",
            "pesada" => "Armaduras Pesadas",
            "escudo" => "Escudos",
            "acessorio" => "Acessórios"];
    }

}
