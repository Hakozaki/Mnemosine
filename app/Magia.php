<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Magia extends Model
{
    public function escolas(){       
        return ExtMagia::escola();
    } 
    
    public function subEscolas($escola = null){               
        return ExtMagia::subEscola($escola);
    } 
}
