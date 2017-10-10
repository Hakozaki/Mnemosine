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
        //dd($request->all());
        $id = $request->id;
        $dominio = \App\Dominio::find($id);
        
        if (is_null($dominio)) {
            \App\Dominio::create($request->all());
        } else {
            $dominio->update($request->all());
        }
        return redirect()->route('dominio.index');
    }

    public function deletar(\App\Dominio $dominio) {
        $dominio->delete();
        return redirect()->route('dominio.index');
    }      

}
