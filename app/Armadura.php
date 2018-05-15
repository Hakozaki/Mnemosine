<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Armadura extends Model
{

    protected $fillable = [
        'nome', 'descricao', 'categoria', 'custo',
        'bonus', 'bonusDestreza', 'falhaArmadura', 'falhaMagia',
        'deslocamento9m', 'deslocamento6m', 'peso'
    ];

    /**
     *  Atributo referente rota.  
     */
    public $pagina = 'armadura';

    /**
     * Retorna as categorias contidas na classe ExtArma
     * @return Array Categorias setadas.
     */
    public function categorias()
    {
        return Auxiliar::categoriaArmadura();
    }

    /**
     * Retorna o valor da categoria.
     * @param String $categoria Categoria cadastrada no banco
     * @return Retorna o nome da categoria
     */
    public function _categoria($categoria)
    {
        if ($categoria == null) {
            return "";
        } else {
            return Auxiliar::categoriaArmadura()[$categoria];
        }
    }



     //----------------------------------------- Inicio Sets --------------------------------------------------

    /**
     * Verifica se o valor do atributo e vario ou nulo     
     * @param string $valor Valor a ser verificado
     * @return string Retorna 0 se o atributo for vazio ou nulo
     */
    private function verificaAtributo($valor, $retornaNulo = false)
    {

        if (empty(str_replace(" ", "", $valor))) {
            if ($retornaNulo) {
                return null;
            } else {
                return "0";
            }
        } else {
            return $valor;
        }
    }

    /**
     * Set do atributo Custo
     * @param string $value Valor do atributo
     */
    public function setCustoAttribute($value)
    {
        $this->attributes['custo'] = $this->verificaAtributo($value);
    }


}
