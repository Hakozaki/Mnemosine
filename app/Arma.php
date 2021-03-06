<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Arma extends Model
{
    protected $fillable = [
        'nome', 'descricao', 'categoria', 'subCategoria', 'tipo',
        'subTipo', 'custo', 'dano', 'incrementoDecisivo', 'distancia',
        'peso', 'tipoDano', 'classe'
    ];

    /**
     *  Atributo referente rota.  
     */
    public $pagina = 'arma';


    /**
     * Retorna as categorias contidas na classe ExtArma
     * @return Array Categorias setadas.
     */
    public function categorias()
    {
        return Auxiliar::categoriaArma();
    }

    /**
     * Retorna as Sub-Categorias contidas na classe ExtArma
     * @return Array Sub-Categorias setadas.
     */
    public function subCategorias()
    {
        return Auxiliar::subCategoriaArma();
    }

    /**
     * Retorna as Tipos contidas na classe ExtArma
     * @return Array Tipos setadas.
     */
    public function tipos()
    {
        return Auxiliar::tipoArma();
    }

    /**
     * Retorna as Sub-Tipos contidas na classe ExtArma
     * @return Array Sub-Tipos setadas.
     */
    public function subTipos()
    {
        return Auxiliar::subTipoArma();
    }

    /**
     * Retorna os Tipos de dano contidos na classe ExtArma
     * @return Array Tipo de dano setadas.
     */
    public function tipoDanos()
    {
        return Auxiliar::tipoDanoArma();
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
            return Auxiliar::categoriaArma()[$categoria];
        }
    }

    /**
     * Retorna o valor da Sub-Categoria.
     * @param String $subCategoria Sub-Categoria cadastrada no banco
     * @return Retorna o nome da Sub-Categoria
     */
    public function _subCategoria($subCategoria)
    {
        if ($subCategoria == null) {
            return "";
        } else {
            return Auxiliar::subCategoriaArma()[$subCategoria];
        }
    }

    /**
     * Retorna o valor da Tipo.
     * @param String $tipo Tipo cadastrada no banco
     * @return Retorna o nome da Tipo
     */
    public function _tipo($tipo)
    {
        if ($tipo == null) {
            return "";
        } else {
            return Auxiliar::tipoArma()[$tipo];
        }
    }

    /**
     * Retorna o valor da Sub-Tipo.
     * @param String $subTipo Sub-Tipo cadastrada no banco
     * @return Retorna o nome da Sub-Tipo
     */
    public function _subTipo($subTipo)
    {
        if ($subTipo == null) {
            return "";
        } else {
            return Auxiliar::subTipoArma()[$subTipo];
        }
    }

    /**
     * Retorna o valor da Tipo de dano.
     * @param String $tipoDano Tipo de dano cadastrada no banco
     * @return Retorna o nome da Tipo de dano
     */
    public function _tipoDano($tipoDano)
    {
        if ($tipoDano == null) {
            return "";
        } else {
            return Auxiliar::tipoDanoArma()[$tipoDano];
        }
    }

}
