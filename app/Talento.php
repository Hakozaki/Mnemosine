<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Talento extends Model {

    protected $fillable = ['nome', 'tipo', 'talentoHabilidade', 'descricao', 'observacao', 'preRequisito',
        'beneficio', 'normal', 'especial'];

    /**
     * Retorna as escolas contidas na classe ExtMagia
     * @return Array Escolas setadas.
     */
    public function talentoHabilidades() {
        return Auxiliar::talentoHabilidade();
    }

    /**
     * Retorna o valor da Tipo.
     * @param String $talentoHabilidade Cadastrada no banco
     * @return Retorna o nome da Tipo
     */
    public function _talentoHabilidades($talentoHabilidade) {
        if ($talentoHabilidade == null) {
            return "";
        } else {
            return Auxiliar::talentoHabilidade()[$talentoHabilidade];
        }
    }

}
