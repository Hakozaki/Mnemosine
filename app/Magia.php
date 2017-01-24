<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Magia extends Model {

    protected $fillable = ['nome', 'descricao', 'escola', 'subEscola', 'descritor',
        'componenteVisual', 'componenteGestual', 'componenteMaterial', 'componenteFoco',
        'componenteFocoDivino', 'componenteXP', 'componenteDescricao', 'tempoExecucao',
        'nivel', 'alcance', 'alvo', 'efeito', 'area', 'testeResistencia',
        'resistenciaMagia', 'duracao'];

    public function escolas() {
        return ExtMagia::escola();
    }

    public function subEscolas($escola = null) {
        return ExtMagia::subEscola($escola);
    }

    public function descritores() {
        return ExtMagia::descritor();
    }

    public function _escola($escola) {
        if ($escola == null) {
            return "";
        } else {
            return ExtMagia::escola()[$escola];
        }
    }

    public function _subEscola($subEscola) {
        if ($subEscola == null) {
            return "";
        } else {
            return ExtMagia::subEscola()[$subEscola];
        }
    }

    public function _descritor($descritor) {
        if ($descritor == null) {
            return "";
        } else {
            return ExtMagia::descritor()[$descritor];
        }
    }

    public function _subEscolaCaracter($subEscola) {
        if ($subEscola == null) {
            return "";
        } else {
            return "(" . ExtMagia::subEscola()[$subEscola] . ")";
        }
    }

    public function _descritorCaracter($descritor) {
        if ($descritor == null) {
            return "";
        } else {
            return "[" . ExtMagia::descritor()[$descritor] . "]";
        }
    }

}
