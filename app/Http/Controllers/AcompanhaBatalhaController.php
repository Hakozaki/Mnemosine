<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AcompanhaBatalhaController extends Controller {

    public function __construct() {
        $this->middleware('auth');
    }

    public function index() {
        $batalhas = \App\Batalha::orderBy('id')->paginate(10);

        return view('acompanhaBatalha.index', compact('batalhas'));
    }

    public function detalhe(\App\Batalha $batalha) {
        return view('acompanhaBatalha.detalhe', compact('batalha'));
    }

    public function retornaJogadores($batalha_id) {
        return \Response::json(\DB::select(
                                " select " .
                                "   bj.*, " .
                                "   p.nome, " .
                                "   p.pv, " .
                                "   sum(bt.dano) as DANO " .
                                " from " .
                                "   batalha_jogadores bj " .
                                " join personagens p on " .
                                "   p.id = bj.jogador_id " .
                                " left join batalha_turnos bt on " .
                                "   bt.jogador_destino = bj.jogador_id and " .
                                "   bt.batalha_id = bj.batalha_id" .
                                " where " .
                                "   bj.batalha_id = " . $batalha_id .
                                " group by bj.id, p.nome, p.pv " .
                                " order by bj.posicao"
        ));
    }

    public function retornaTurnos($batalha_id) {
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
                                " order by bt.id desc limit 10 "));
    }

    public function retornaBatalha($batalha_id) {
        return \Response::json(\DB::select(" select * from batalhas where id = " . $batalha_id));
    }

}
