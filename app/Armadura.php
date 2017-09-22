<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Armadura extends Model {

    protected $fillable = ['nome', 'descricao', 'categoria', 'custo',
        'bonus', 'bonusDestreza', 'falhaArmadura', 'falhaMagia',
        'deslocamento9m', 'deslocamento6m', 'peso'];

    /**
     * Verifica o valor do atributo custo.
     * 
     * @param $value Valor de custo. 
     */
    //public function setCustoAttribute($value) {
    //    if (is_null($value) or empty($value)) {
    //        $this->attributes['custo'] = 0;
    //    } else {
    //        $this->attributes['custo'] = $value;
    //    }
    //}

    /**
     * Verifica o valor do atributo peso.
     * 
     * @param $value Valor do peso. 
     */
    //public function setPesoAttribute($value) {
    //    if (is_null($value) or empty($value)) {
    //        $this->attributes['peso'] = 0;
    //    } else {
    //        $this->attributes['peso'] = $value;
    //    }
    //}

    /**
     * Retorna as categorias contidas na classe ExtArma
     * @return Array Categorias setadas.
     */
    public function categorias() {
        return Auxiliar::categoriaArmadura();
    }

    /**
     * Retorna o valor da categoria.
     * @param String $categoria Categoria cadastrada no banco
     * @return Retorna o nome da categoria
     */
    public function _categoria($categoria) {
        if ($categoria == null) {
            return "";
        } else {
            return Auxiliar::categoriaArmadura()[$categoria];
        }
    }

}
