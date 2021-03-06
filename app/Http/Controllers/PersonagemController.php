<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PersonagemController extends Controller {

    public function __construct() {
        $this->middleware('auth');
    }

    public function index() {
        $personagens = \App\Personagem::paginate(10);

        return view('personagem.index', compact('personagens'));
    }

    public function detalhe(\App\Personagem $personagem) {
        //dd($personagem);
        return view('personagem.detalhe', compact('personagem'));
    }

    public function salvar(Request $request) {
        //dd($request->all());
        $id = $request->id;        
        if (empty($id)) {
            \App\Personagem::create($request->all());
        } else {            
            $personagem = \App\Personagem::find($id);
            $personagem->update($request->all());
        }

        $talentos = $request->talentos;

        if (!is_null($talentos)) {
            foreach ($talentos as $key => $value) {
                $talento = \App\Talento::find($key);
                $personagem->adicionaTalento($talento);
            }
        }

        $classes = $request->classes;

        if (!is_null($classes)) {
            foreach ($classes as $key => $value) {
                $personagem->adicionaClasse($key, $value);
            }
        }

        return redirect()->route('personagem.index');
    }

    public function deletar(\App\Personagem $personagem) {
        $personagem->delete();
        return redirect()->route('personagem.index');
    }

}
