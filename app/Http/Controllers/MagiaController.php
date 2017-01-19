<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MagiaController extends Controller {

    public function __construct() {
        $this->middleware('auth');
    }

    public function index() {
        $magias = \App\Magia::paginate(10);

        return view('magia.index', compact('magias'));
    }

    public function detalhe(\App\Magia $magia) {
        return view('magia.detalhe', compact('magia'));
    }

    public function salvar(Request $request) {
        $id = $request->id;
        $magia = \App\magia::find($id);    
        //dd($request->all());
        
        if(is_null($magia)){            
            \App\magia::create($request->all());                       
        }else{
            $magia->update($request->all());
        }               
        return redirect()->route('magia.index');
    }

    public function deletar(\App\Magia $magia) {  
        $magia->delete();            
        return redirect()->route('magia.index');
    }     
    
    public function descritores(){
        return \App\ExtMagia::descritor();
    }

}
