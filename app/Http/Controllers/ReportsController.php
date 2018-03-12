<?php

namespace App\Http\Controllers;

use JasperPHP\JasperPHP;
use Illuminate\Http\Request;

class ReportsController extends Controller {

    /**
     * Reporna um array com os parametros de conexão
     * @return Array
     */
    public function getDatabaseConfig() {
        return ['driver' => 'postgres',
            'host' => env('DB_HOST'),
            'port' => env('DB_PORT'),
            'username' => env('DB_USERNAME'),
            'password' => env('DB_PASSWORD'),
            'database' => env('DB_DATABASE'),
            'jdbc_dir' => base_path() . env('JDBC_DIR', '/vendor/lavela/phpjasper/src/JasperStarter/jdbc'),];
    }

    public function index($nomeRelatorio, $filtros) {
        // coloca na variavel o caminho do novo relatório que será gerado
        $output = public_path() . '/reports/' . time() . '_' . $nomeRelatorio;
        // instancia um novo objeto JasperPHP
        $report = new JasperPHP;

        // chama o método que irá gerar o relatório
        // passamos por parametro:
        // o arquivo do relatório com seu caminho completo
        // o nome do arquivo que será gerado
        // o tipo de saída
        // parametros ( nesse caso não tem nenhum)    
        $report->process(
                public_path() . '/reports/' . $nomeRelatorio . '.jrxml', $output, ['pdf'], $filtros, $this->getDatabaseConfig())->execute();
        $file = $output . '.pdf';
        $path = $file;

        // caso o arquivo não tenha sido gerado retorno um erro 404
        if (!file_exists($file)) {
            abort(404);
        }
        //caso tenha sido gerado pego o conteudo
        $file = file_get_contents($file);
        //deleto o arquivo gerado, pois iremos mandar o conteudo para o navegador
        unlink($path);
        // retornamos o conteudo para o navegador que íra abrir o PDF
        return response($file, 200)
                        ->header('Content-Type', 'application/pdf')
                        ->header('Content-Disposition', 'inline; filename="' . $nomeRelatorio . '.pdf"');
    }
    
    /**
     * Reporna um array com os parametros de pesquisa
     * @return Array
     */
    public function filtros($filtros) {
        if (!is_null($filtros)) {
            $retorno = [];
            foreach ($filtros as $filtro) {
                $retorno = $this->array_push_assoc($retorno, $filtro[0], $filtro[2]);
            }

            return $retorno;
        } else {
            return array();
        }
    }

    public function imprimir($filtros, $nomeRelatorio) {        
        return $this->index($nomeRelatorio, $this->filtros($filtros));
    }

    function array_push_assoc($array, $key, $value) {
        $array[$key] = $value;
        return $array;
    }

}
