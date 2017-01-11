<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Magia extends Model {

    protected $fillable = ['nome', 'descricao', 'escola', 'descritor',
        'componentes', 'tempoExecucao', 'nivel', 'alcance', 'alvo',
        'efeito', 'area', 'testeResistencia', 'resistenciaMagia', 'duracao'];

    public function escolas() {
        return ExtMagia::escola();
    }

    public function subEscolas($escola = null) {
        return ExtMagia::subEscola($escola);
    }

}
