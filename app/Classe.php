<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Classe extends Model {

    protected $fillable = ['nome', 'nivel', 'descricao'];
    
    /**
     *  Atributo referente rota.  
     */
    public $pagina = 'classe';

}
