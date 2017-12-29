<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Personagem_classe extends Model {

    protected $table = "personagem_classe";
    protected $fillable = ['personagem_id', 'classe_id', 'nivel'];

}
