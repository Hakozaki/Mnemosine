<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ExtArma extends Model {

    /**
     * Função que retorna uma lista de Categorias.     
     * @return Array Lista de Categorias.
     */
    public static function categoria() {
        return ["simples" => "Armas Simples",
            "comum" => "Comuns",
            "exotica" => "Exóticas"];
    }

    /**
     * Função que retorna uma lista de Sub-Categorias.
     * @return Array Lista de Sub-Categorias.
     */
    public static function subCategoria() {
        return ["branca" => "Arma Branca",
            "distancia" => "Ataque a distância"];
    }

    /**
     * Função que retorna uma lista de Tipos.
     * @return Array Lista de Tipos.
     */
    public static function tipo() {
        return ["desarmado" => "Ataque Desarmado",
            "leve" => "Armas Leves",
            "umaMao" => "Armas de Uma Mão",
            "duasMaos" => "Armas de Duas Mãos",
            "disparo" => "Armas de Disparo",
            "municao" => "Munição"];
    }

    /**
     * Função que retorna uma lista de Sub-Tipos.
     * @return Array Lista de Sub-Tipos.
     */
    public static function subTipo() {
        return ["haste" => "Haste",
            "dupla" => "Armas Duplas",
            "arremesso" => "Armas de Arremesso"];
    }

}
