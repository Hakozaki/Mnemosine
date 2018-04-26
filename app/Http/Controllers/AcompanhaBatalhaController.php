<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AcompanhaBatalhaController extends Controller {

    public function __construct() {
        $this->middleware('auth');
    }

    public function index() {
        $batalhas = \App\Batalha::orderBy('id')->paginate(10);

        return view('batalha.index', compact('batalhas'));
    }

}
