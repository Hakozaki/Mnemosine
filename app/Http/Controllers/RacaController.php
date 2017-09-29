<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RacaController extends Controller
{

    public function __construct() {
        $this->middleware('auth');
    }

    public function index() {
        $racas = \App\Raca::paginate(10);

        return view('raca.index', compact('racas'));
    }

    public function detalhe(\App\Raca $raca) {
        return view('raca.detalhe', compact('raca'));
    }

    public function salvar(Request $request) {
        $id = $request->id;
        $raca = \App\Raca::find($id);
        
        if (is_null($raca)) {
            \App\Raca::create($request->all());
        } else {
            $raca->update($request->all());
        }
        return redirect()->route('raca.index');
    }

    public function deletar(\App\Raca $raca) {
        $raca->delete();
        return redirect()->route('raca.index');
    }

}
