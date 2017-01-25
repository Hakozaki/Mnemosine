<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Talento extends Model {

    protected $fillable = ['nome', 'tipo', 'descricao', 'preRequisito',
        'beneficio', 'normal', 'especial'];
    

}
