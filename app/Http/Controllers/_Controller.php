<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;

class _Controller extends Controller
{

    protected $modelo;

    public function __construct($modelo)
    {
        $this->middleware('auth');
        $this->modelo = new $modelo;
    }

    /**
     * Direciona para a página index
     *
     * @return view(modelo.index)
     */
    public function index()
    {

        $modelos = $this->modelo::paginate(10);

        return view($this->modelo->pagina . '.index', [$this->modelo->pagina . 's' => $modelos]);
    }

    /**
     * Direciona para a página de detalhe
     *
     * @param Model $modelo
     * @return void
     */
    public function detalhe($modelo = null)
    {
        if ($modelo) {
            $_modelo = $this->modelo::find($modelo);
        } else {
            $_modelo = $this->modelo;
        }

        return view($this->modelo->pagina . '.detalhe', [$this->modelo->pagina => $_modelo]);
    }

    /**
     * Função que persiste os dados
     *
     * @param Request $request Request da página
     * @return void
     */
    public function salvar(Request $request)
    {
        $id = $request->id;
        if (empty($id)) {
            try {
                $_modelo = $this->modelo::create($request->all());
                $this->mensagem('cadastroSucesso', ' ' . $_modelo->nome);
            } catch (\Exception $e) {
                $this->mensagem('erroCadastro', ' ao cadastrar.');
                $this->consoleLog($e->getMessage());
            }
        } else {
            try {
                $_modelo = $this->modelo::find($id);
                $_modelo->update($request->all());
                $this->mensagem('atualizacaoSucesso', ' ' . $_modelo->nome);
            } catch (\Exception $e) {
                $this->mensagem('erroCadastro', ' ao cadastrar.');
                $this->consoleLog($e->getMessage());
            }
        }

        return redirect()->route($this->modelo->pagina . '.index');
    }

    /**
     * Função que remove o registro
     *
     * @param Modelo $modelo
     * @return void
     */
    public function deletar($modelo = null)
    {
        if ($modelo) {
            $_modelo = $this->modelo::find($modelo);
        } else {
            $_modelo = $this->modelo;
        }

        try {
            $_modelo->delete();
            $this->mensagem('remocaoSucesso', ' ' . $_modelo->nome);
            return redirect()->route($this->modelo->pagina . '.index');
        } catch (\Exception $e) {
            $this->mensagem('erroCadastro', ' ao remover registro.');
            $this->consoleLog($e->getMessage());
        }


    }

    /**
     * Imprime na tela uma mensagem com as configurações pré-definidas
     * @param String $mensagem Mensagem a ser mostrada 
     * cadastroSucesso / atualizacaoSucesso / remocaoSucesso / erroCadastro
     * @param String $complemento Complemento de mensagem
     */
    public function mensagem($mensagem, $complemento = null)
    {
        switch ($mensagem) {
            case 'cadastroSucesso':
                $msg = 'Registro ' . $complemento . ' casdastrado com sucesso!';
                $tipo_msg = 'alert-success';
                $label = 'AVISO';
                break;
            case 'atualizacaoSucesso':
                $msg = 'Registro ' . $complemento . ' atualizado com sucesso!';
                $tipo_msg = 'alert-success';
                $label = 'AVISO';
                break;
            case 'remocaoSucesso':
                $msg = 'Registro ' . $complemento . ' removido com sucesso!';
                $tipo_msg = 'alert-success';
                $label = 'AVISO';
                break;
            case 'erroCadastro':
                $msg = 'Erro ' . $complemento;
                $tipo_msg = 'alert-danger';
                $label = 'ERRO';
                break;

            default:
                $msg = 'ERRO 501';
                $tipo_msg = 'alert-warning';
                $label = 'ERRO';

        }

        \Session::flash('flash_message', ['msg' => $msg, 'class' => $tipo_msg, 'label' => $label]);

    }

    /**
     * Função que executa o error logging
     */
    public function consoleLog($mensagem)
    {
        Log::error($mensagem);

        error_log($mensagem, 0);
    }


}
