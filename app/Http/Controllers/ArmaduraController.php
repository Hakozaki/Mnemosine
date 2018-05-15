<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ArmaduraController extends _Controller
{

    public function __construct()
    {
        parent::__construct(\App\Armadura::class);
    }

}
