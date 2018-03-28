<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DominioController extends Controller
{

    public function __construct() {
        $this->middleware('auth');
    }

    public function index() {
        $dominios = \App\Dominio::paginate(10);

        return view('dominio.index', compact('dominios'));
    }

    public function detalhe(\App\Dominio $dominio) {
        return view('dominio.detalhe', compact('dominio'));
    }

    public function salvar(Request $request) {        
        $id = $request->id;                
        if (empty($id)) {
            \App\Dominio::create($request->all());
        } else {
            $dominio = \App\Dominio::find($id);
            $dominio->update($request->all());
        }
        return redirect()->route('dominio.index');
    }

    public function deletar(\App\Dominio $dominio) {
        $dominio->delete();
        return redirect()->route('dominio.index');
    }      

}
