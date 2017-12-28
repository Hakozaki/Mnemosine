<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Classe extends Model {

    protected $fillable = ['nome', 'descricao'];

    /**
     * 
     * @return Array Retorna os talentos relacionados ao personagem
     */
    public function classePersonagems() {
        return $this->belongsToMany('App\Personagem', 'personagem_classe', 'classe_id', 'personagem_id');
    }

}
