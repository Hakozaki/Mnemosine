<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ExtMagia extends Model {

    /**
     * Função que retorna uma lista de escolas.
     * @return Array Lista de escolas.
     */
    public static function escola() {
        return ["abjuracao" => "Abjuração",
            "conjuracao" => "Conjuração",
            "necromancia" => "Necromancia",
            "transmutacao" => "Tranmutação",
            "adivinhacao" => "Adivinhação",
            "encantamento" => "Encantamento",
            "evocacao" => "Evocação",
            "ilusao" => "Ilusão",
            "universal" => "Universal"];
    }

    /**
     * Função que retorna uma lista de Sub-Escolas.
     * @return Array Lista de Sub-Escolas.
     */
    public static function subEscola($escola = null) {
        if ($escola == null) {
            return ["invocacao" => "Invocação",
                "convocacao" => "Convocação",
                "cura" => "Cura",
                "teletransporte" => "Teletransporte",
                "criacao" => "Criação",
                "videncia" => "Vidência",
                "feitico" => "Feitiço",
                "compulsao" => "Compulsão",
                "ideia" => "Idéia",
                "sensacao" => "Sensação",
                "padrao" => "Padrão",
                "fantasma" => "Fantasma",
                "sombra" => "Sombra"];
        } elseif ($escola == "conjuracao") {
            return ["invocacao" => "Invocação",
                "convocacao" => "Convocação",
                "cura" => "Cura",
                "teletransporte" => "Teletransporte",
                "criacao" => "Criação"];
        } elseif ($escola == "adivinhacao") {
            return ["videncia" => "Vidência"];
        } elseif ($escola == "encantamento") {
            return ["feitico" => "Feitiço",
                "compulsao" => "Compulsão"];
        } elseif ($escola == "ilusao") {
            return ["ideia" => "Idéia",
                "sensacao" => "Sensação",
                "padrao" => "Padrão",
                "fantasma" => "Fantasma",
                "sombra" => "Sombra"];
        }
    }

    /**
     * Função que retorna uma lista de Componentes.
     * @return Array Lista de Componentes.
     */
    public static function componente() {
        return ["verbal" => "V",
            "gestual" => "G",
            "material" => "M",
            "foco" => "F",
            "focodivino" => "FD",
            "custodexp" => "XP"];
    }

    /**
     * Função que retorna uma lista de Descritores.
     * @return Array Lista de Descritores.
     */
    public static function descritor() {
        return ["acaoMental" => "Ação mental",
            "acido" => "Ácido",
            "agua" => "Água",
            "ar" => "Ar",
            "bem" => "Bem",
            "caos" => "Caos",
            "dependenteDeIdioma" => "Dependente de idioma",
            "eletricidade" => "Eletricidade",
            "energia" => "Energia",
            "escuridão" => "Escuridão",
            "fogo" => "Fogo",
            "frio" => "Frio",
            "luz" => "Luz",
            "mal" => "Mal",
            "medo" => "Medo",
            "morte" => "Morte",
            "ordem" => "Ordem",
            "sônico" => "Sônico",
            "terra" => "Terra"];
    }

}
