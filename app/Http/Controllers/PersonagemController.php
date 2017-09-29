<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PersonagemController extends Controller
{

    public function __construct() {
        $this->middleware('auth');
    }

    public function index() {
        $personagens = \App\Personagem::paginate(10);

        return view('personagem.index', compact('personagens'));
    }

    public function detalhe(\App\Personagem $personagem) {
        return view('personagem.detalhe', compact('personagem'));
    }

    public function salvar(Request $request) {          
        $id = $request->id;
        $personagem = \App\Personagem::find($id);
        
        if (is_null($personagem)) {
            \App\Personagem::create($request->all());
        } else {
            $personagem->update($request->all());
        }
        return redirect()->route('personagem.index');
    }

    public function deletar(\App\Personagem $personagem) {
        $personagem->delete();
        return redirect()->route('personagem.index');
    }

}
