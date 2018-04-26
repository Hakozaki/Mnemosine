<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BatalhaController extends Controller {

    public function __construct() {
        $this->middleware('auth');
    }

    public function index() {
        $batalhas = \App\Batalha::orderBy('id')->paginate(10);

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

        return redirect()->route('batalha.detalhe', $batalha);
    }

    public function adicionarPersonagem(Request $request) {

        $posicao = \DB::select('select count(*) as contador from batalha_jogadores where batalha_id = ' . $request->input('batalha_id'));

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
        //dd($request->all());

        if ($request->input('jogador_destino') !== "") {
            $jogador_destino = $request->input('jogador_destino');
        } else {
            return redirect()->back();
        }

        if ($request->input('dano') !== "") {
            $dano = $request->input('dano_cura') . $request->input('dano');
        } else {
            $dano = '0';
        }

        $parametros = ['batalha_id' => $request->input('batalha_id'),
            'rodada' => $request->input('rodada'),
            'turno' => $request->input('_turno'),
            'acao' => $request->input('acao'),
            'jogador_origem' => $request->input('jogador_origem'),
            'jogador_destino' => $jogador_destino,
            'efeito' => $request->input('efeito'),
            'duracao_efeito' => $request->input('duracao_efeito'),
            'efeito_ativo' => $request->input('efeito_ativo'),
            'dano' => $dano,
        ];


        \App\Batalha_turno::create($parametros);

        if (!empty($request->input('removeEfeito'))) {
            $this->removeEfeitos($request->input('removeEfeito'));
        }

        $this->incrementaAcao($request->input('batalha_id'));

        return redirect()->back();
    }

    public function subirPosicao($batalha_id, $id) {
        $batalha_jogadores = \DB::select(
                        ' select ' .
                        '   * ' .
                        ' from batalha_jogadores ' .
                        ' where ' .
                        '   batalha_id = ' . $batalha_id .
                        ' order by posicao asc');

        $jogador_anterior = null;

        foreach ($batalha_jogadores as $batalha_jogador) {
            if ($batalha_jogador->id == $id && $jogador_anterior !== null) {
                \DB::update('UPDATE batalha_jogadores SET posicao = (posicao + 1) WHERE id = ' . $jogador_anterior->id);
                \DB::update('UPDATE batalha_jogadores SET posicao = (posicao - 1) WHERE id = ' . $id);
            }

            $jogador_anterior = $batalha_jogador;
        }

        return redirect()->back();
    }

    public function descerPosicao($id) {
        $jogador = \DB::select(
                        ' select ' .
                        '   * ' .
                        ' from batalha_jogadores ' .
                        ' where ' .
                        '  id = ' . $id);

        $jogador_proximo = \DB::select(
                        ' select ' .
                        '   * ' .
                        ' from batalha_jogadores ' .
                        ' where ' .
                        '  batalha_id = ' . $jogador[0]->batalha_id .
                        '  and posicao = ' . ($jogador[0]->posicao + 1));

        if (!empty($jogador_proximo)) {
            \DB::update('UPDATE batalha_jogadores SET posicao = (posicao + 1) WHERE id = ' . $jogador[0]->id);
            \DB::update('UPDATE batalha_jogadores SET posicao = (posicao - 1) WHERE id = ' . $jogador_proximo[0]->id);
        }

        return redirect()->back();
    }

    public function removeEfeitos($efeitos) {        
        foreach ($efeitos as $efeito) {
            \DB::update('UPDATE batalha_turnos SET efeito_ativo = 0 WHERE id = ' . $efeito);
        }
    }

    public function resetaEfeitos($batalha_id) {
        $batalha = \DB::select('SELECT * FROM batalhas WHERE id =  ' . $batalha_id)[0];        

        $efeitos = \DB::select('SELECT * FROM batalha_turnos WHERE efeito_ativo = 1 and batalha_id =  ' . $batalha_id);

        $efeitos_tratados = [];

        foreach ($efeitos as $efeito) {
            if ($batalha->rodada > ($efeito->rodada + $efeito->duracao_efeito)) {
                array_push($efeitos_tratados, $efeito->id);
            }
        }
        
        $this->removeEfeitos($efeitos_tratados);        
    }

    public function incrementaAcao($batalha) {
        \DB::update('UPDATE batalhas SET acao = acao + 1 WHERE id = ' . $batalha);
    }

    public function resetaAcao($batalha) {
        \DB::update('UPDATE batalhas SET acao = 1 WHERE id = ' . $batalha);
    }

    public function resetaTurno($batalha) {
        \DB::update('UPDATE batalhas SET turno = 1 WHERE id = ' . $batalha);
    }

    public function passaTurno($batalha_id) {

        $turno = \DB::select(
                        ' select ' .
                        '   turno ' .
                        ' from batalhas where id = ' . $batalha_id);

        $personagem = \DB::select(
                        ' select ' .
                        '   count(*) as contador ' .
                        ' from batalha_jogadores where batalha_id = ' . $batalha_id);

        if ($turno[0]->turno < $personagem[0]->contador) {
            \DB::update('UPDATE batalhas SET turno = turno + 1 WHERE id = ' . $batalha_id);
        } else {
            $this->passaRodada($batalha_id);
        }

        $this->resetaAcao($batalha_id);

        return redirect()->back();
    }

    public function passaRodada($batalha_id) {
        \DB::update('UPDATE batalhas SET rodada = rodada + 1 WHERE id = ' . $batalha_id);

        $this->resetaTurno($batalha_id);

        $this->resetaAcao($batalha_id);

        $this->resetaEfeitos($batalha_id);

        return redirect()->back();
    }

    public function ordenarIniciativa($batalha_id) {
        $jogadores = \DB::table('batalha_jogadores')->where('batalha_id', '=', $batalha_id)->orderBy('iniciativa', 'desc')->get();
        $posicao = 1;
        foreach ($jogadores as $jogador) {
            \DB::select('UPDATE batalha_jogadores SET posicao = ' . $posicao . ' WHERE id = ' . $jogador->id);
            $posicao++;
        }
        return redirect()->back();
    }

    public function retornaEfeitos($batalha_id, $jogador_id) {
        return \Response::json(\DB::select(' select '
                                . ' bt.id, '
                                . ' bt.rodada, '
                                . ' bt.turno, '
                                . ' bt.acao, '
                                . ' bt.jogador_origem, '
                                . ' p.nome, '
                                . ' bt.efeito, '
                                . ' bt.duracao_efeito '
                                . ' from '
                                . ' batalha_turnos bt '
                                . 'join personagens p on p.id = bt.jogador_origem '
                                . 'where '
                                . ' bt.efeito_ativo = 1 '
                                . ' and bt.batalha_id = ' . $batalha_id
                                . ' and bt.jogador_destino = ' . $jogador_id));
    }

    public function retornaTurnos($batalha_id, $jogador_id) {
        return \Response::json(\DB::select(
                                " select " .
                                "	bt.id, " .
                                "	bt.rodada, " .
                                "	bt.turno, " .
                                "	bt.acao, " .
                                "	bt.dano, " .
                                "	bt.efeito_ativo, " .
                                "	case bt.efeito_ativo " .
                                "		when 0 then bt.efeito || ' (INATIVO)'   " .
                                "		when 1 then bt.efeito " .
                                "	end as _efeito, " .
                                "	bt.efeito, " .
                                "	bt.duracao_efeito, " .
                                "	jo.nome as jogadorOrigem, " .
                                "	jd.nome as jogadorDestino " .
                                " from batalha_turnos bt " .
                                " join personagens jo on bt.jogador_origem = jo.id " .
                                " join personagens jd on  bt.jogador_destino = jd.id " .
                                " where " .
                                "	bt.batalha_id = " . $batalha_id .
                                "       and bt.jogador_origem = " . $jogador_id));
    }

}
