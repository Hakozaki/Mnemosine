<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Divindade extends Model {

    protected $fillable = ['nome', 'descricao', 'tendencia', 'alinhamento', 'observacao'];

    /**
     * Retorna as tendencias contidas na classe Auxiliar
     * @return Array Tendencias setadas.
     */
    public function magias1() {
        $magias = Magia::all();        
        return $magias;
    }

    /**
     * Retorna as tendencias contidas na classe Auxiliar
     * @return Array Tendencias setadas.
     */
    public function tendencias() {
        return Auxiliar::tendenciaDivindade();
    }

    /**
     * Retorna o valor da categoria.
     * @param String $tendencia Tendencia cadastrada no banco
     * @return Retorna a tendencia do personagem
     */
    public function _tendencias($tendencia) {
        if ($tendencia == null) {
            return "";
        } else {
            return Auxiliar::tendenciaDivindade()[$tendencia];
        }
    }

    /**
     * Retorna as alinhamentos contidas na classe Auxiliar
     * @return Array Alinhamentos setadas.
     */
    public function alinhamentos() {
        return Auxiliar::alinhamentoDivindade();
    }

    /**
     * Retorna o valor do alinhamento.
     * @param String $alinhamento Tendencia cadastrada no banco
     * @return Retorna a tendencia do personagem
     */
    public function _alinhamentos($alinhamento) {
        if ($alinhamento == null) {
            return "";
        } else {
            return Auxiliar::alinhamentoDivindade()[$alinhamento];
        }
    }

}
