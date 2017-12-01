<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DivindadeController extends Controller {

    public function __construct() {
        $this->middleware('auth');
    }

    public function index() {
        $divindades = \App\Divindade::paginate(10);

        return view('divindade.index', compact('divindades'));
    }

    public function detalhe(\App\Divindade $divindade) {
        return view('divindade.detalhe', compact('divindade'));
    }

    public function salvar(Request $request) {
        dd($request->all());
        $id = $request->id;
        $divindade = \App\Divindade::find($id);

        if (is_null($divindade)) {
            $divindade = \App\Divindade::create($request->all());
        } else {
            $divindade->update($request->all());
        }

        $dominios = $request->dominios;

        if (!is_null($dominios)) {
            foreach ($dominios as $key => $value) {
                $dominio = \App\Dominio::find($key);
                $divindade->adicionaDominio($dominio);
            }
        }

        return redirect()->route('divindade.index');
    }

    public function deletar(\App\Divindade $divindade) {
        $divindade->delete();
        return redirect()->route('divindade.index');
    }

}
