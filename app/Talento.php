<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Talento extends Model {

    protected $fillable = ['nome', 'tipo', 'talentoHabilidade', 'descricao', 'preRequisito',
        'beneficio', 'normal', 'especial'];
    
    /**
     * Retorna as escolas contidas na classe ExtMagia
     * @return Array Escolas setadas.
     */
    public function talentoHabilidades() {
        return Auxiliar::talentoHabilidade();
    }

}
