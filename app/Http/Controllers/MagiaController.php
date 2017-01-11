<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MagiaController extends Controller {

    public function __construct() {
        $this->middleware('auth');
    }

    public function index() {
        $magias = \App\Magia::paginate(10);

        return view('magia.index', compact('magias'));
    }

    public function detalhe(\App\Magia $magia) {

        return view('magia.detalhe', compact('magia'));
    }

    public function salvar(Request $request) {
        \App\magia::create($request->all());                       

        return redirect()->route('magia.index');
    }

    public function deletar(\App\Magia $magia) {        
        return redirect()->route('magia.index');
    }

}
