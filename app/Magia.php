<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Magia extends Model {

    protected $fillable = ['nome', 'descricao', 'escola', 'subEscola', 'descritor',
        'componenteVisual', 'componenteGestual', 'componenteMaterial', 'componenteFoco',
        'componenteFocoDivino', 'componenteXP', 'componenteDescricao', 'tempoExecucao',
        'nivel', 'alcance', 'alvo', 'efeito', 'area', 'testeResistencia',
        'resistenciaMagia', 'duracao'];

    /**
     * Retorna as escolas contidas na classe ExtMagia
     * @return Array Escolas setadas.
     */
    public function escolas() {
        return ExtMagia::escola();
    }

    /**
     * Retorna as Sub-Escolas contidas na classe ExtMagia
     * @param String $escola Escola (padrão null) 
     * @return Array Sub-Escolas setadas.
     */
    public function subEscolas($escola = null) {
        return ExtMagia::subEscola($escola);
    }

    /**
     * Retorna os descritores contidos na classe ExtMagia
     * @return Array Descritores setados.
     */
    public function descritores() {
        return ExtMagia::descritor();
    }

    /**
     * Retorna o valor da escola.
     * @param String $escola Escola cadastrada no banco
     * @return Retorna o nome da escola
     */
    public function _escola($escola) {
        if ($escola == null) {
            return "";
        } else {
            return ExtMagia::escola()[$escola];
        }
    }

    /**
     * Retorna o valor da Sub-Escola.
     * @param String $subEscola Sub-Escola cadastrada no banco
     * @return Retorna o nome da Sub-Escola.
     */
    public function _subEscola($subEscola) {
        if ($subEscola == null) {
            return "";
        } else {
            return ExtMagia::subEscola()[$subEscola];
        }
    }

    /**
     * Retorna o valor do descritor.
     * @param String $descritor Descritor cadastrado no banco
     * @return Retorna o nome do descritor.
     */
    public function _descritor($descritor) {
        if ($descritor == null) {
            return "";
        } else {
            return ExtMagia::descritor()[$descritor];
        }
    }

    /**
     * Retorna o valor da Sub-Escola com os '(' ')'.
     * @param String $subEscola Sub-Escola cadastrada no banco
     * @return Retorna o nome da Sub-Escola.
     */
    public function _subEscolaCaracter($subEscola) {
        if ($subEscola == null) {
            return "";
        } else {
            return "(" . ExtMagia::subEscola()[$subEscola] . ")";
        }
    }

    /**
     * Retorna o valor do descritor com '[' ']'.
     * @param String $descritor Descritor cadastrado no banco
     * @return Retorna o nome do descritor.
     */
    public function _descritorCaracter($descritor) {
        if ($descritor == null) {
            return "";
        } else {
            return "[" . ExtMagia::descritor()[$descritor] . "]";
        }
    }

}
