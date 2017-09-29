<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Personagem extends Model {

    protected $table = 'personagens';
    protected $fillable = ['nome', 'idade', 'sexo', 'tendencia', 'alinhamento', 'tamanho', 'altura', 'peso', 'olhos', 'cabelo', 'pele', 'reducaoDano',
        'resistenciaMagia', 'deslocamento', 'jogador_id', 'raca_id', 'divindade_id', 'pv', 'forca', 'destreza', 'constituicao',
        'inteligencia', 'sabedoria', 'carisma', 'modForca', 'modDestreza', 'modConstituicao', 'modInteligencia',
        'modSabedoria', 'modCarisma', 'fortitude', 'reflexos', 'vontade', 'modFortitude', 'modReflexos', 'modVontade', 'habFortitude', 'habReflexos',
        'habVontade', 'magicoFortitude', 'magicoReflexos', 'magicoVontade', 'outrosFortitude', 'outrosReflexos', 'outrosVontade', 'ca', 'armaduraCa',
        'escudoCa', 'destrezaCa', 'tamanhoCa', 'armaduraNaturalCa', 'deflexaoCa', 'outrosCa', 'iniciativa', 'modDestrezaIniciativa', 'outrosIniciativa',
        'toque', 'surpresa', 'bba', 'agarrar', 'modAgarrar', 'forcaAgarrar', 'tamanhoAgarrar', 'outrosAgarrar'];

    /**
     * Retorna as Raças 
     * @return Array de Raças.
     */
    public function divindades() {
        return \App\Divindade::all();
    }

    /**
     * Retorna as Raças 
     * @return Array de Raças.
     */
    public function racas() {
        return \App\Raca::all();
    }

    /**
     * Retorna as tendencias contidas na classe Auxiliar
     * @return Array Tendencias setadas.
     */
    public function tendencias() {
        return Auxiliar::tendenciaPersonagem();
    }

    /**
     * Retorna o valor da categoria.
     * @param String $tendencia Tendencia cadastrada no banco
     * @return Retorna a tendencia do personagem
     */
    public function _tendencias($tendencia) {
        if ($tendencia == null) {
            return "";
        } else {
            return Auxiliar::tendenciaPersonagem()[$tendencia];
        }
    }

    /**
     * Retorna as alinhamentos contidas na classe Auxiliar
     * @return Array Alinhamentos setadas.
     */
    public function alinhamentos() {
        return Auxiliar::alinhamentoPersonagem();
    }

    /**
     * Retorna o valor do alinhamento.
     * @param String $alinhamento Tendencia cadastrada no banco
     * @return Retorna a tendencia do personagem
     */
    public function _alinhamentos($alinhamento) {
        if ($alinhamento == null) {
            return "";
        } else {
            return Auxiliar::alinhamentoPersonagem()[$alinhamento];
        }
    }

}
