<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Batalha extends Model {

    protected $table = 'batalhas';
    protected $fillable = ['usuario_id', 'rodada', 'turno', 'acao', 'data'];
    protected $casts = [
        'id' => 'integer'
    ];

    public function personagens() {
        return Personagem::all();
    }

    public function jogadores() {
        return \DB::select(
                        ' select ' .
                        '   bj.*, ' .
                        '   p.nome, ' .
                        '   p.pv, ' .
                        '   sum(bt.dano) as DANO ' .
                        ' from ' .
                        '   batalha_jogadores bj ' .
                        ' join personagens p on ' .
                        '   p.id = bj.jogador_id ' .
                        ' left join batalha_turnos bt on ' .
                        '   bt.jogador_destino = bj.jogador_id and ' .
                        '   bt.batalha_id = bj.batalha_id' .
                        ' where ' .
                        '   bj.batalha_id = ' . $this->id .
                        ' group by bj.id, p.nome, p.pv ' .
                        ' order by bj.posicao');
    }

}
