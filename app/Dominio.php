<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dominio extends Model {

    protected $fillable = ['nome', 'poderes', 'magia1', 'magia2', 'magia3', 'magia4',
        'magia5', 'magia6', 'magia7', 'magia8', 'magia9'];
    
    public $pagina = 'dominio';

    /**
     * 
     * @return Array Retorna as Divindades relacionados ao Dominio
     */
    public function dominioDivindades() {
        return $this->belongsToMany('App\Divindade', 'divindade_dominio', 'dominio_id', 'divindade_id');
    }

    /**
     * 
     * @return Array Retorna as Divindades relacionados ao Dominio
     */
    public function magias() {
        return $this->belongsToMany('App\Magia', 'divindade_dominio', 'dominio_id', 'divindade_id');
    }

    /**
     * Retorna as tendencias contidas na classe Auxiliar
     * @return Array Tendencias setadas.
     */
    public function magias1() {
        $magias = Magia::where('nivel', 'like', '%1%')->get();
        return $magias;
    }

    /**
     * Retorna as tendencias contidas na classe Auxiliar
     * @return Array Tendencias setadas.
     */
    public function magias2() {
        $magias = Magia::where('nivel', 'like', '%2%')->get();
        return $magias;
    }

    /**
     * Retorna as tendencias contidas na classe Auxiliar
     * @return Array Tendencias setadas.
     */
    public function magias3() {
        $magias = Magia::where('nivel', 'like', '%3%')->get();
        return $magias;
    }

    /**
     * Retorna as tendencias contidas na classe Auxiliar
     * @return Array Tendencias setadas.
     */
    public function magias4() {
        $magias = Magia::where('nivel', 'like', '%4%')->get();
        return $magias;
    }

    /**
     * Retorna as tendencias contidas na classe Auxiliar
     * @return Array Tendencias setadas.
     */
    public function magias5() {
        $magias = Magia::where('nivel', 'like', '%5%')->get();
        return $magias;
    }

    /**
     * Retorna as tendencias contidas na classe Auxiliar
     * @return Array Tendencias setadas.
     */
    public function magias6() {
        $magias = Magia::where('nivel', 'like', '%6%')->get();
        return $magias;
    }

    /**
     * Retorna as tendencias contidas na classe Auxiliar
     * @return Array Tendencias setadas.
     */
    public function magias7() {
        $magias = Magia::where('nivel', 'like', '%7%')->get();
        return $magias;
    }

    /**
     * Retorna as tendencias contidas na classe Auxiliar
     * @return Array Tendencias setadas.
     */
    public function magias8() {
        $magias = Magia::where('nivel', 'like', '%8%')->get();
        return $magias;
    }

    /**
     * Retorna as tendencias contidas na classe Auxiliar
     * @return Array Tendencias setadas.
     */
    public function magias9() {
        $magias = Magia::where('nivel', 'like', '%9%')->get();
        return $magias;
    }

    /**
     * Verifica se o valor do atributo e vario ou nulo     
     * @param string $valor Valor a ser verificado
     * @return string Retorna 0 se o atributo for vazio ou nulo
     */
    private function verificaAtributo($valor, $retornaNulo = false) {

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
     * Set do atributo Magia Circulo 1
     * @param string $value Valor do atributo
     */
    public function setMagia1Attribute($value) {
        $this->attributes['magia1'] = $this->verificaAtributo($value, true);
    }
    /**
     * Set do atributo Magia Circulo 2
     * @param string $value Valor do atributo
     */
    public function setMagia2Attribute($value) {
        $this->attributes['magia2'] = $this->verificaAtributo($value, true);
    }
    /**
     * Set do atributo Magia Circulo 3
     * @param string $value Valor do atributo
     */
    public function setMagia3Attribute($value) {
        $this->attributes['magia3'] = $this->verificaAtributo($value, true);
    }
    /**
     * Set do atributo Magia Circulo 4
     * @param string $value Valor do atributo
     */
    public function setMagia4Attribute($value) {
        $this->attributes['magia4'] = $this->verificaAtributo($value, true);
    }
    /**
     * Set do atributo Magia Circulo 5
     * @param string $value Valor do atributo
     */
    public function setMagia5Attribute($value) {
        $this->attributes['magia5'] = $this->verificaAtributo($value, true);
    }
    /**
     * Set do atributo Magia Circulo 6
     * @param string $value Valor do atributo
     */
    public function setMagia6Attribute($value) {
        $this->attributes['magia6'] = $this->verificaAtributo($value, true);
    }
    /**
     * Set do atributo Magia Circulo 7
     * @param string $value Valor do atributo
     */
    public function setMagia7Attribute($value) {
        $this->attributes['magia7'] = $this->verificaAtributo($value, true);
    }
    /**
     * Set do atributo Magia Circulo 8
     * @param string $value Valor do atributo
     */
    public function setMagia8Attribute($value) {
        $this->attributes['magia8'] = $this->verificaAtributo($value, true);
    }
    /**
     * Set do atributo Magia Circulo 9
     * @param string $value Valor do atributo
     */
    public function setMagia9Attribute($value) {
        $this->attributes['magia9'] = $this->verificaAtributo($value, true);
    }

}
