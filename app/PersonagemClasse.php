<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PersonagemClasse extends Model {

    protected $table = "personagem_classe";
    protected $fillable = ['personagem_id', 'classe_id', 'nivel'];

}
