<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Armadura extends Model {

    protected $fillable = ['nome', 'descricao', 'categoria', 'custo',
        'bonus', 'bonusDestreza', 'falhaArmadura', 'falhaMagia',
        'deslocamento9m', 'deslocamento6m', 'peso'  ];

    /**
     * Retorna as categorias contidas na classe ExtArma
     * @return Array Categorias setadas.
     */
    public function categorias() {
        return ExtArmadura::categoria();
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
            return ExtArmadura::categoria()[$categoria];
        }
    }


}
