<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

class HomeController extends Controller {

    public $listas = [];

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        if (\Auth::check()) {
            return view('home');
        } else {
            return view('login');
        }
    }

    public function salvar(Request $request) {
        dd($request->all());
    }

    public function getListas() {
        return $this->listas;
    }

    public function setListas($valor) {
        array_push($this->listas, $valor);
        $this->index($this->listas);
    }

}
