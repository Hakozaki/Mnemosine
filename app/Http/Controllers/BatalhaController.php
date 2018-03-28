<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BatalhaController extends Controller {

    public function __construct() {
        $this->middleware('auth');
    }

    public function index() {
        $batalhas = \App\Batalha::paginate(10);

        return view('batalha.index', compact('batalhas'));
    }

    public function detalhe(\App\Batalha $batalha) {
        return view('batalha.detalhe', compact('batalha'));
    }

    public function salvar(Request $request) {
        $id = $request->id;
        if (empty($id)) {
            \App\Batalha::create($request->all());
        } else {
            $batalha = \App\Batalha::find($id);
            $batalha->update($request->all());
        }
        return redirect()->route('batalha.index');
    }

    public function deletar(\App\Batalha $batalha) {
        $batalha->delete($batalha);
        return redirect()->route('batalha.index');
    }

    public function criaPartida() {

        $parametros = ["usuario_id" => Auth()->User()->id,
            "rodada" => 1,
            "turno" => 1,
            "data" => date("Y-m-d h:m:s")];

        $batalha = \App\Batalha::create($parametros);

        return $this->detalhe($batalha);
    }

    public function adicionarPersonagem(Request $request) {
        \App\Batalha_jogador::create($request->all());
        return redirect()->back();
    }

    public function aplicarDano(Request $request) {
        dd($request->all());
    }

}
