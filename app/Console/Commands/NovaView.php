<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class NovaView extends Command {

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:scaffold {classe : Nome da Classe que será criada} '
            . ' {campos* : Array de campos separados por "/" EX: TIPO/CAMPO } ';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Cria uma nova classe,migration,view';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct() {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle() {
        $classe = $this->argument('classe');

        $campos = $this->argument('campos');

        $migration = "create_" . $classe . "s_table";
        $this->call('make:migration', ["name" => $migration, "--create" => strtolower($classe)]);
    }

    /*
     * Caminho da pasta criada
     */

    private $caminho;

    /*
     * 
     */

    private function criaPasta($nome) {
        $this->caminho = resource_path() . "\\views\\" . $nome;
        mkdir($this->caminho, 0777);
    }

    private function criaArquivo($nome, $campos) {
        $fp = fopen($this->caminho . "\\" . $nome . ".blade.php", "w+");

        foreach ($campos as $value) {
            $posicao = strpos($value, '/');

            $this->info(substr($value, 0, $posicao));
            $this->info(substr($value, $posicao + 1));
        }

        $this->criaMigration($fp, $nome, $campos);
    }

    private function criaMigration($fp, $nome, $campos) {
        fputs($fp, "<?php");
        fputs($fp, "use Illuminate\Support\Facades\Schema;");
        fputs($fp, "use Illuminate\Database\Schema\Blueprint;");
        fputs($fp, "use Illuminate\Database\Migrations\Migration;");
        fputs($fp, "class " . "Create" . $nome . "Table" . " extends Migration {");
        fputs($fp, "/**");
        fputs($fp, "* Run the migrations.");
        fputs($fp, "*");
        fputs($fp, "* @return void");
        fputs($fp, "*/");
        fputs($fp, "public function up() {");
        fputs($fp, 'Schema::create(' . $nome . ', function (Blueprint $table) {');
        fputs($fp, '$table->increments("id");');
        foreach ($campos as $value) {
            $posicao = strpos($value, '/');
            $tipo = substr($value, 0, $posicao);
            $campo = substr($value, $posicao + 1);
        }
        fputs($fp, "});");
        fputs($fp, "}");
        fputs($fp, "}");




        fclose($fp);
    }

}
