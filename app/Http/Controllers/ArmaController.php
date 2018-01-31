<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Http\Requests\ArmaRequest;

class ArmaController extends Controller {

    public function __construct() {
        $this->middleware('auth');
    }

    public function index() {
        $armas = \App\Arma::paginate(10);

        return view('arma.index', compact('armas'));
    }

    public function detalhe(\App\Arma $arma) {
        return view('arma.detalhe', compact('arma'));
    }

    public function salvar(ArmaRequest $request) {        
        $id = $request->id;
        $arma = \App\Arma::find($id);

        if (is_null($arma)) {
            \App\Arma::create($request->all());
        } else {
            $arma->update($request->all());
        }
        return redirect()->route('arma.index');
    }

    public function pesquisar(Request $request) {
        //dd($request->all());
        if (!is_null($request->input('filtros'))) {
            $armas = \App\Arma::where($request->input('filtros'))->paginate(10);
        } else {
            $armas = \App\Arma::paginate(10);
        }

        return view('arma.index', compact('armas'));
    }

    public function deletar(\App\Arma $arma) {
        $arma->delete();
        return redirect()->route('arma.index');
    }

}
