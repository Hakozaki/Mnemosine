<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TalentoController extends Controller {

    public function __construct() {
        $this->middleware('auth');
    }

    public function index() {
        $talentos = \App\Talento::paginate(10);

        return view('talento.index', compact('talentos'));
    }

    public function detalhe(\App\Talento $talento) {
        return view('talento.detalhe', compact('talento'));
    }

    public function salvar(Request $request) {        
        $id = $request->id;                
        if (empty($id)) {
            \App\Talento::create($request->all());
        } else {
            $talento = \App\Talento::find($id);
            $talento->update($request->all());
        }
        return redirect()->route('talento.index');
    }

    public function deletar(\App\Talento $talento) {
        $talento->delete();
        return redirect()->route('talento.index');
    }

}
