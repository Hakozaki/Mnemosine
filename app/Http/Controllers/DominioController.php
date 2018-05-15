<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DominioController extends _Controller
{

    public function __construct()
    {
        parent::__construct(\App\Dominio::class);
    }

}
