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
        $id = $request->id;
        $divindade = \App\Divindade::find($id);

        if (is_null($divindade)) {
            \App\Divindade::create($request->all());
        } else {
            $divindade->update($request->all());
        }
        return redirect()->route('divindade.index');
    }

    public function deletar(\App\Divindade $divindade) {
        $divindade->delete();
        return redirect()->route('divindade.index');
    }

}
