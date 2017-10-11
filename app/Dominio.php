<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dominio extends Model {

    protected $fillable = ['nome', 'poderes', 'descricao', 'observacao', 'magia1', 'magia2', 'magia3', 'magia4',
        'magia5', 'magia6', 'magia7', 'magia8', 'magia9'];

    
    /**
     * Retorna as tendencias contidas na classe Auxiliar
     * @return Array Tendencias setadas.
     */
    public function divindades($dominio) {
        $sql = 'select * from ';
        $divindades = Divindade::all();
        return $divindades;
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

}
