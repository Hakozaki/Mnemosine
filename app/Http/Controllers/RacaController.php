<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RacaController extends _Controller
{

    public function __construct()
    {
        parent::__construct(\App\Raca::class);
    }

}
