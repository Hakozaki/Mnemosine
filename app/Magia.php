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
return ExtMagia::escola()[$escola];
}

public function _subEscola($subEscola) {
return ExtMagia::subEscola()[$subEscola];
}

public function _descritor($descritor) {
return ExtMagia::descritor()[$descritor];
}

}
