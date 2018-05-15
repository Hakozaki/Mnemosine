<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Http\Requests\ArmaRequest;

class ArmaController extends _Controller
{

    public function __construct()
    {
        parent::__construct(\App\Arma::class);
    }

    public function pesquisar(Request $request)
    {
        if (!is_null($request->input('filtros'))) {
            $armas = \App\Arma::where($request->input('filtros'))->paginate(10);
        } else {
            $armas = \App\Arma::paginate(10);
        }

        return view('arma.index', compact('armas'));
    }

    public function imprimir(Request $request)
    {
        $report = new ReportsController();

        return $report->imprimir($request->input('filtros'), 'listaArmas');
    }

    public function imprimirDetalhe($id)
    {
        $report = new ReportsController();

        return $report->index('arma', array('id' => $id));
    }

    function array_push_assoc($array, $key, $value)
    {
        $array[$key] = $value;
        return $array;
    }

}
