<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DivindadeController extends _Controller
{

    public function __construct()
    {
        parent::__construct(\App\Divindade::class);
    }

    public function salvar(Request $request)
    {
        $id = $request->id;
        if (empty($id)) {
            try {
                $divindade = \App\Divindade::create($request->all());
                $this->mensagem('cadastroSucesso', ' ' . $divindade->nome);
            } catch (\Exception $e) {
                $this->mensagem('erroCadastro', ' ao cadastrar.');
                $this->consoleLog($e->getMessage());
            }
        } else {
            try {
                $divindade = \App\Divindade::find($id);
                $divindade->update($request->all());
                $this->mensagem('atualizacaoSucesso', ' ' . $divindade->nome);
            } catch (\Exception $e) {
                $this->mensagem('erroCadastro', ' ao atualizar.');
                $this->consoleLog($e->getMessage());
            }

        }

        $dominios = $request->dominios;

        if (!is_null($dominios)) {
            foreach ($dominios as $key => $value) {
                try {
                    $dominio = \App\Dominio::find($key);
                    $divindade->adicionaDominio($dominio);
                } catch (\Exception $e) {                    
                    $this->consoleLog($e->getMessage());
                }

            }
        }

        return redirect()->route('divindade.index');
    }


}
