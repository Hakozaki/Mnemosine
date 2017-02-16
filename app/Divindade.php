<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Divindade extends Model {

    protected $fillable = ['nome', 'descricao'];

    /**
     * Função que retorna uma lista de Categorias.     
     * @return Array Lista de Categorias.
     */
    public static function tendencia() {
        return ["lealEbom" => "Leal e Bom",
            "neutroEbom" => "Neutro e Bom",
            "caóticoEbom" => "Caótico e Bom",
            "lealEneutro" => "Leal e Neutro",
            "neutro" => "Neutro",
            "caoticoEneutro" => "Caótico e Neutro",
            "lealEmau" => "Leal e Mau",
            "neutroEmau" => "Neutro e Mau",
            "caoticoEmau" => "Caótico e Mau"];
    }

}
