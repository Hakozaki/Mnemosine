<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ClasseController extends _Controller
{

    public function __construct()
    {
        parent::__construct(\App\Classe::class);
    }

}
