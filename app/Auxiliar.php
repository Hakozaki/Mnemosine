<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Auxiliar extends Model {

    /**
     * Função que retorna uma lista de Categorias de armas.     
     * @return Array Lista de Categorias de armas.
     */
    public static function categoriaArma() {
        return ["simples" => "Armas Simples",
            "comum" => "Comuns",
            "exotica" => "Exóticas"];
    }

    /**
     * Função que retorna uma lista de Sub-Categorias de armas.
     * @return Array Lista de Sub-Categorias de armas.
     */
    public static function subCategoriaArma() {
        return ["branca" => "Arma Branca",
            "distancia" => "Ataque a distância"];
    }

    /**
     * Função que retorna uma lista de Tipos de armas.
     * @return Array Lista de Tipos de armas.
     */
    public static function tipoArma() {
        return ["desarmado" => "Ataque Desarmado",
            "leve" => "Armas Leves",
            "umaMao" => "Armas de Uma Mão",
            "duasMaos" => "Armas de Duas Mãos",
            "disparo" => "Armas de Disparo",
            "municao" => "Munição"];
    }

    /**
     * Função que retorna uma lista de Sub-Tipos de armas.
     * @return Array Lista de Sub-Tipos de armas.
     */
    public static function subTipoArma() {
        return ["haste" => "Haste",
            "dupla" => "Armas Duplas",
            "arremesso" => "Armas de Arremesso"];
    }

    /**
     * Função que retorna uma lista de Tipo de dano de armas.
     * @return Array Lista de Tipo de dano de armas.
     */
    public static function tipoDanoArma() {
        return ["concussao" => "Concussão",
            "perfurante" => "Perfurante",
            "cortante" => "Cortante",
            "concussaoEperfurante" => "Concussão e Perfurante",
            "concussaoOUperfurante" => "Concussão ou Perfurante",
            "perfuranteEcortante" => "Perfurante e Cortante",
            "perfuranteOUcortante" => "Perfurante ou Cortante",
            "concussaoEcortante" => "Concussão e Cortante",
            "concussaoOUcortante" => "Concussão ou Cortante"];
    }

    /**
     * Função que retorna uma lista de Categorias de armadura.     
     * @return Array Lista de Categorias de armadura.
     */
    public static function categoriaArmadura() {
        return ["leve" => "Armaduras Leves",
            "media" => "Armaduras Médias",
            "pesada" => "Armaduras Pesadas",
            "escudo" => "Escudos",
            "acessorio" => "Acessórios"];
    }

    /**
     * Função que retorna uma lista de escolas de magia.
     * @return Array Lista de escolas.
     */
    public static function escolaMagia() {
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
     * Função que retorna uma lista de Sub-Escolas da magia.
     * @return Array Lista de Sub-Escolas.
     */
    public static function subEscolaMagia($escola = null) {
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
     * Função que retorna uma lista de Componentes da magia.
     * @return Array Lista de Componentes.
     */
    public static function componenteMagia() {
        return ["verbal" => "V",
            "gestual" => "G",
            "material" => "M",
            "foco" => "F",
            "focodivino" => "FD",
            "custodexp" => "XP"];
    }

    /**
     * Função que retorna uma lista de Descritores da magia.
     * @return Array Lista de Descritores.
     */
    public static function descritorMagia() {
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

    /**
     * Função que retorna uma lista de Tendencias do personagem.     
     * @return Array Lista de Tendencias.
     */
    public static function tendenciaPersonagem() {
        return ["neutro" => "Neutro",
            "leal" => "Leal",
            "caotico" => "Caótico"];
    }
    
    /**
     * Função que retorna uma lista de Alinhamentos do personagem.     
     * @return Array Lista de Alinhamentos.
     */
    public static function alinhamentoPersonagem() {
        return ["neutro" => "Neutro",
            "bom" => "Bom",
            "mal" => "Mal"];
    }

    /**
     * Função que retorna uma lista de Pericias do personagem.     
     * @return Array Lista de pericias.
     */
    public static function periciaPersonagem() {
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

    /**
     * Função que retorna uma lista de Tipos de Talentos.     
     * @return Array Lista de Talentos.
     */
    public static function talentoHabilidade() {
        return ["talento" => "Talento",
            "habilidade" => "Habilidade Especial"];
    }
    
    
    /**
     * Função que retorna uma lista de Tendencias do personagem.     
     * @return Array Lista de Tendencias.
     */
    public static function tendenciaDivindade() {
        return ["neutro" => "Neutro",
            "leal" => "Leal",
            "caotico" => "Caótico"];
    }
    
    /**
     * Função que retorna uma lista de Alinhamentos do personagem.     
     * @return Array Lista de Alinhamentos.
     */
    public static function alinhamentoDivindade() {
        return ["neutro" => "Neutro",
            "bom" => "Bom",
            "mal" => "Mal"];
    }

}
