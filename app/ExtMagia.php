<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ExtMagia extends Model {

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

    public static function componente() {
        return ["verbal" => "V",
            "gestual" => "G",
            "material" => "M",
            "foco" => "F",
            "focodivino" => "FD",
            "custodexp" => "XP"];
    }

    public static function descritor() {
        return ["acaoMental" => "ação mental",
            "acido" => "ácido",
            "agua" => "água",
            "ar" => "ar",
            "bem" => "bem",
            "caos" => "caos",
            "dependenteDeIdioma" => "dependente de idioma",
            "eletricidade" => "eletricidade",
            "energia" => "energia",
            "escuridão" => "escuridão",
            "fogo" => "fogo",
            "frio" => "frio",
            "luz" => "luz",
            "mal" => "mal",
            "medo" => "medo",
            "morte" => "morte",
            "ordem" => "ordem",
            "sônico" => "sônico",
            "terra" => "terra"];
    }

}
