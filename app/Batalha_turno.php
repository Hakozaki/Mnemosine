<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Batalha_turno extends Model
{
    protected $fillable = ['batalha_id','turno','acao','jogador_origem','jogador_destino','efeito','duracao_efeito','efeito_ativo','dano'];
}
