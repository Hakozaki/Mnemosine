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
            "acao" => 1,
            "data" => date("Y-m-d h:m:s")];

        $batalha = \App\Batalha::create($parametros);

        return $this->detalhe($batalha);
    }

    public function adicionarPersonagem(Request $request) {
        $posicao = \DB::select('select count(*) as contador from batalha_jogador where batalha_id = ' . $request->input('batalha_id'));

        $parametros = ["batalha_id" => $request->input('batalha_id'),
            "jogador_id" => $request->input('jogador_id'),
            "pv" => $request->input('pv'),
            "iniciativa" => $request->input('iniciativa'),
            "posicao" => ($posicao[0]->contador + 1)
        ];

        \App\Batalha_jogador::create($parametros);

        return redirect()->back();
    }

    public function aplicarDano(Request $request) {
        $parametros = ['batalha_id' => $request->input('batalha_id'),
            'turno_id' => $request->input('turno_id'),
            'acao' => $request->input('acao'),
            'jogador_origem' => $request->input('jogador_origem'),
            'jogador_destino' => $request->input('jogador_destino'),
            'efeito' => $request->input('efeito'),
            'duracao_efeito' => $request->input('duracao_efeito'),
            'efeito_ativo' => $request->input('efeito_ativo'),
            'dano' => ('-' . $request->input('dano')),
        ];

        \App\Batalha_turno::create($parametros);

        $this->incrementaAcao($request->input('batalha_id'));

        return redirect()->back();
    }

    public function aplicarCura(Request $request) {
        $parametros = ['batalha_id' => $request->input('batalha_id'),
            'turno_id' => $request->input('turno_id'),
            'acao' => $request->input('acao'),
            'jogador_origem' => $request->input('jogador_origem'),
            'jogador_destino' => $request->input('jogador_destino'),
            'efeito' => $request->input('efeito'),
            'duracao_efeito' => $request->input('duracao_efeito'),
            'efeito_ativo' => $request->input('efeito_ativo'),
            'dano' => $request->input('dano'),
        ];

        \App\Batalha_turno::create($parametros);

        $this->incrementaAcao($request->input('batalha_id'));

        return redirect()->back();
    }

    public function subirPosicao($batalha_id, $jogador_id) {
        $jogadores = \DB::select(
                        ' select ' .
                        '   * ' .
                        ' from batalha_jogador ' .
                        ' where ' .
                        '   batalha_id = ' . $batalha_id .
                        ' order by posicao asc');
        
        dd($jogadores);
        foreach ($jogadores as $jogador) {

            if ($jogador->id == $jogador_id) {
                dd($jogador->id);
            }

            $jogador_anterior = $jogador;
        }
    }

    public function incrementaAcao($batalha) {
        \DB::update('UPDATE batalha SET acao = acao + 1 WHERE id = ' . $batalha);
    }

    public function resetaAcao($batalha) {
        \DB::update('UPDATE batalha SET acao = 1 WHERE id = ' . $batalha);
    }

    public function resetaTurno($batalha) {
        \DB::update('UPDATE batalha SET turno = 1 WHERE id = ' . $batalha);
    }

    public function passaTurno($batalha_id) {

        $turno = \DB::select(
                        ' select ' .
                        '   turno ' .
                        ' from batalha where id = ' . $batalha_id);
        $personagem = \DB::select(
                        ' select ' .
                        '   count(*) as contador ' .
                        ' from batalha_jogador where batalha_id = ' . $batalha_id);

        if ($turno[0]->turno < $personagem[0]->contador) {
            \DB::update('UPDATE batalha SET turno = turno + 1 WHERE id = ' . $batalha_id);
        } else {
            $this->passaRodada($batalha_id);
        }

        $this->resetaAcao($batalha_id);

        return redirect()->back();
    }

    public function passaRodada($batalha_id) {
        \DB::update('UPDATE batalha SET rodada = rodada + 1 WHERE id = ' . $batalha_id);

        $this->resetaTurno($batalha_id);

        $this->resetaAcao($batalha_id);

        return redirect()->back();
    }

    public function ordenarIniciativa($batalha_id) {
        $jogadores = \DB::table('batalha_jogador')->where('batalha_id', '=', $batalha_id)->orderBy('iniciativa', 'desc')->get();
        $posicao = 1;
        foreach ($jogadores as $jogador) {
            \DB::select('UPDATE batalha_jogador SET posicao = ' . $posicao . ' WHERE id = ' . $jogador->id);
            $posicao++;
        }
        return redirect()->back();
    }

}
