<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Auxiliar;
use App\Magia;

class MagiaController extends _Controller
{

    public function __construct()
    {
        parent::__construct(Magia::class);
    }

    /**
     * Função que retorna os descritores da classe auxiliar
     *
     * @return Array Lista de descritores de magia 
     */
    public function descritores()
    {
        return Auxiliar::descritorMagia();
    }

}
