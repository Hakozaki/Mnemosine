<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Magia extends Model {

    protected $fillable = ['nome', 'descricao', 'escola', 'subEscola' , 'descritor',
        'componentes', 'tempoExecucao', 'nivel', 'alcance', 'alvo',
        'efeito', 'area', 'testeResistencia', 'resistenciaMagia', 'duracao'];

    public function escolas() {
        return ExtMagia::escola();
    }

    public function subEscolas($escola = null) {
        return ExtMagia::subEscola($escola);
    }
    
    public function descritores() {
        return ExtMagia::descritor();
    }

}
