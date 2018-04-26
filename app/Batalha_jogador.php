<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Batalha_jogador extends Model {

    protected $table = 'batalha_jogadores';
    
    protected $fillable = ['batalha_id', 'jogador_id', 'pv', 'iniciativa', 'posicao'];

}
