<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Batalha_turno extends Model {

    protected $table = 'batalha_turnos';
    protected $fillable = ['batalha_id', 'rodada', 'turno', 'acao', 'jogador_origem',
        'jogador_destino', 'efeito', 'duracao_efeito', 'efeito_ativo', 'dano'];

}
