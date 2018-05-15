<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TalentoController extends _Controller
{

    public function __construct()
    {
        parent::__construct(\App\Talento::class);
    }


}
