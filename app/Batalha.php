<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Batalha extends Model {

    protected $table = 'batalha';
    protected $fillable = ['usuario_id', 'rodada', 'turno', 'data'];
    protected $casts = [
        'id' => 'integer'
    ];

    public function personagens() {
        return Personagem::all();
    }

    public function jogadores() {
        return \DB::table('batalha_jogador')
                        ->join('personagens', 'batalha_jogador.jogador_id', '=', 'personagens.id')                        
                        ->select('batalha_jogador.*', 'personagens.nome', 'personagens.pv')
                        ->where('batalha_id', $this->id)->get();
    }

}
