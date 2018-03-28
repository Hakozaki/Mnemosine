<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ArmaduraController extends Controller {

    public function __construct() {
        $this->middleware('auth');
    }

    public function index() {
        $armaduras = \App\Armadura::paginate(10);

        return view('armadura.index', compact('armaduras'));
    }

    public function detalhe(\App\Armadura $armadura) {
        return view('armadura.detalhe', compact('armadura'));
    }

    public function salvar(Request $request) {
        $id = $request->id;
        if (empty($id)) {
            \App\Armadura::create($request->all());
        } else {
            $armadura = \App\Armadura::find($id);
            $armadura->update($request->all());
        }
        return redirect()->route('armadura.index');
    }

    public function deletar(\App\Armadura $armadura) {
        $armadura->delete();
        return redirect()->route('armadura.index');
    }

}
