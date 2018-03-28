<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ClasseController extends Controller
{

    public function __construct() {
        $this->middleware('auth');
    }

    public function index() {
        $classes = \App\Classe::paginate(10);

        return view('classe.index', compact('classes'));
    }

    public function detalhe(\App\Classe $classe) {
        return view('classe.detalhe', compact('classe'));
    }

    public function salvar(Request $request) {
        $id = $request->id;                
         if (empty($id)) {
            \App\Classe::create($request->all());
        } else {
            $classe = \App\Classe::find($id);
            $classe->update($request->all());
        }
        return redirect()->route('classe.index');
    }

    public function deletar(\App\Classe $classe) {
        $classe->delete();
        return redirect()->route('classe.index');
    }

}
