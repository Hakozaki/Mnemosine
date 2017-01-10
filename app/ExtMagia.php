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
            "ilusao" => "Ilusão"];
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

}
