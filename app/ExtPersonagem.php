<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ExtPersonagem extends Model {

    /**
     * Função que retorna uma lista de Categorias.     
     * @return Array Lista de Categorias.
     */
    public static function tendencia() {
        return ["LealEbom" => "Leal e Bom",
            "NeutroEbom" => "Neutro e Bom",
            "CaóticoEbom" => "Caótico e Bom",
            "LealEneutro" => "Leal e Neutro",
            "Neutro" => "Neutro",
            "CaóticoEneutro" => "Caótico e Neutro",
            "LealEmau" => "Leal e Mau",
            "NeutroEmau" => "Neutro e Mau",
            "CaóticoEmau" => "Caótico e Mau"];
    }

    /**
     * Função que retorna uma lista de Pericias.     
     * @return Array Lista de pericias.
     */
    public static function pericia() {
        return ["abrirFechaduras" => ["nome" => "Abrir Fechaduras", "st" => "Não", "hab" => "Des"],
            "acrobacias" => ["nome" => "Acrobacias", "st" => "Não", "hab" => "Des", "penArm" => "Sim"],
            "adestrarAnimais" => ["nome" => "Adestrar Animais", "st" => "Não", "hab" => "Car", "penArm" => "Não"],
            "arteDaFuga" => ["nome" => "Arte da Fuga", "st" => "Sim", "hab" => "Des", "penArm" => "Sim"],
            "atuacao" => ["nome" => "Atuação", "st" => "Sim", "hab" => "Car", "penArm" => "Não"],
            "avaliacao" => ["nome" => "Avaliação", "st" => "Sim", "hab" => "Int", "penArm" => "Não"],
            "blefar" => ["nome" => "Blefar", "st" => "Sim", "hab" => "Car", "penArm" => "Não"],
            "cavalgar" => ["nome" => "Cavalgar", "st" => "Sim", "hab" => "Des", "penArm" => "Não"],
            "concentracao" => ["nome" => "Concentração", "st" => "Sim", "hab" => "Con", "penArm" => "Não"],
            "conArcano" => ["nome" => "Conhecimento (arcano)", "st" => "Não", "hab" => "Int", "penArm" => "Não"],
            "conArqEng" => ["nome" => "Conhecimento (arquitetura e engenharia)", "st" => "Não", "hab" => "Int", "penArm" => "Não"],
            "conGeografia" => ["nome" => "Conhecimento (geografia)", "st" => "Não", "hab" => "Int", "penArm" => "Não"],
            "conHistoria" => ["nome" => "Conhecimento (história)", "st" => "Não", "hab" => "Int", "penArm" => "Não"],
            "conLocal" => ["nome" => "Conhecimento (local)", "st" => "Não", "hab" => "Int", "penArm" => "Não"],
            "conMasmorras" => ["nome" => "Conhecimento (masmorras)", "st" => "Não", "hab" => "Int", "penArm" => "Não"],
            "conNatureza" => ["nome" => "Conhecimento (natureza)", "st" => "Não", "hab" => "Int", "penArm" => "Não"],
            "conNobReal" => ["nome" => "Conhecimento (nobreza e realeza)", "st" => "Não", "hab" => "Int", "penArm" => "Não"],
            "conPlanos" => ["nome" => "Conhecimento (planos)", "st" => "Não", "hab" => "Int", "penArm" => "Não"],
            "conReligiao" => ["nome" => "Conhecimento (religião)", "st" => "Não", "hab" => "Int", "penArm" => "Não"],
            "cura" => ["nome" => "Cura", "st" => "Sim", "hab" => "Sab", "penArm" => "Não"],
            "decifrarEscrita" => ["nome" => "Decifrar Escrita", "st" => "Não", "hab" => "Int", "penArm" => "Não"],
            "diplomacia" => ["nome" => "Diplomacia", "st" => "Sim", "hab" => "Car", "penArm" => "Não"],
            "disfarces" => ["nome" => "Disfarces", "st" => "Sim", "hab" => "Car", "penArm" => "Não"],
            "equilibrio" => ["nome" => "Equilíbrio", "st" => "Sim", "hab" => "Des", "penArm" => "Sim"],
            "escalar" => ["nome" => "Escalar", "st" => "Sim", "hab" => "For", "penArm" => "Sim"],
            "esconderSe" => ["nome" => "Esconder-se", "st" => "Sim", "hab" => "Des", "penArm" => "Sim"],
            "falarIdiomas" => ["nome" => "Falar Idioma", "st" => "Não", "hab" => "N/A", "penArm" => "Não"],
            "falsificacao" => ["nome" => "Falsificação", "st" => "Sim", "hab" => "Int", "penArm" => "Não"],
            "furtividade" => ["nome" => "Furtividade", "st" => "Sim", "hab" => "Des", "penArm" => "Sim"],
            "identificarMagia" => ["nome" => "Identificar Magia", "st" => "Não", "hab" => "Int", "penArm" => "Não"],
            "intimidacao" => ["nome" => "Intimidação", "st" => "Sim", "hab" => "Car", "penArm" => "Não"],
            "natacao" => ["nome" => "Natação", "st" => "Sim", "hab" => "For", "penArm" => "Dobro"],
            "observar" => ["nome" => "Observar", "st" => "Sim", "hab" => "Sab", "penArm" => "Não"],
            "observarInformacao" => ["nome" => "Obter Informação", "st" => "Sim", "hab" => "Car", "penArm" => "Não"],
            "oficios" => ["nome" => "Ofícios", "st" => "Sim", "hab" => "Int", "penArm" => "Não"],
            "operarMecanismos" => ["nome" => "Operar Mecanismo", "st" => "Não", "hab" => "Int", "penArm" => "Não"],
            "ouvir" => ["nome" => "Ouvir", "st" => "Sim", "hab" => "Sab", "penArm" => "Não"],
            "prestidigitacao" => ["nome" => "Prestidigitação", "st" => "Não", "hab" => "Des", "penArm" => "Sim"],
            "procurar" => ["nome" => "Procurar", "st" => "Sim", "hab" => "Int", "penArm" => "Não"],
            "profissao" => ["nome" => "Profissão", "st" => "Não", "hab" => "Sab", "penArm" => "Não"],
            "saltar" => ["nome" => "Saltar", "st" => "Sim", "hab" => "For", "penArm" => "Sim"],
            "sentirMotivacao" => ["nome" => "Sentir Motivação", "st" => "Sim", "hab" => "Sab", "penArm" => "Não"],
            "sobrevivencia" => ["nome" => "Sobrevivência", "st" => "Sim", "hab" => "Sab", "penArm" => "Não"],
            "usarCordas" => ["nome" => "Usar Cordas", "st" => "Sim", "hab" => "Des", "penArm" => "Não"],
            "usarIntrumentoMagico" => ["nome" => "Usar Intrumento Mágico", "st" => "Não", "hab" => "Car", "penArm" => "Não"]];
    }

}
