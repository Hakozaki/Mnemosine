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
        try {
            return ExtMagia::escola()[$escola];            
        } catch (Exception $ex) {
            return "";
        }
        
    }

    public function _subEscola($subEscola) {
        try {
            return ExtMagia::subEscola()[$subEscola];
        } catch (Exception $ex) {
            return "";
        }
        
    }

    public function _descritor($descritor) {
        try {
            return ExtMagia::descritor()[$descritor];
        } catch (Exception $ex) {
            return "";
        }
        
    }

}
