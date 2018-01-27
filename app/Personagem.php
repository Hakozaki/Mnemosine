<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Personagem extends Model {

    protected $table = 'personagens';
    protected $fillable = ['nome', 'idade', 'sexo', 'tendencia', 'alinhamento', 'tamanho', 'altura', 'peso', 'olhos', 'cabelo', 'pele', 'reducaoDano',
        'resistenciaMagica', 'deslocamento', 'jogador_id', 'raca_id', 'divindade_id', 'pv', 'forca', 'destreza', 'constituicao',
        'inteligencia', 'sabedoria', 'carisma', 'modForca', 'modDestreza', 'modConstituicao', 'modInteligencia',
        'modSabedoria', 'modCarisma', 'fortitude', 'reflexos', 'vontade', 'modFortitude', 'modReflexos', 'modVontade', 'habFortitude', 'habReflexos',
        'habVontade', 'magicoFortitude', 'magicoReflexos', 'magicoVontade', 'outrosFortitude', 'outrosReflexos', 'outrosVontade', 'ca', 'armaduraCa',
        'escudoCa', 'destrezaCa', 'tamanhoCa', 'armaduraNaturalCa', 'deflexaoCa', 'outrosCa', 'iniciativa', 'modDestrezaIniciativa', 'outrosIniciativa',
        'toque', 'surpresa', 'bba', 'agarrar', 'modAgarrar', 'forcaAgarrar', 'tamanhoAgarrar', 'outrosAgarrar'];

    /**
     * 
     * @return Array Retorna os talentos relacionados ao personagem
     */
    public function personagemTalentos() {
        return $this->belongsToMany('App\Talento', 'personagem_talento', 'personagem_id', 'talento_id')->withTimestamps();
    }        

    /**
     * 
     * @return Array Retorna os talentos relacionados ao personagem
     */    
    public function personagemClasses() {
        return $this->hasMany('App\PersonagemClasse');
    }
    
    /**
     * 
     * @return Array Retorna os Classes do personagem
     */ 
    public function _personagemClasses() {
        return $this->hasMany('App\PersonagemClasse')->leftJoin('classes','classes.id','=','personagem_classe.classe_id');
    }

    /**
     * 
     * @param \App\Talento $talento Talento para salvar
     * @return $this Retorna o modelo
     */
    public function adicionaTalento(Talento $talento) {
        return $this->personagemTalentos()->save($talento);
    }

    /**
     * 
     * @param \App\Classe $classe Classe para salvar
     * @return $this Retorna o modelo
     */
    public function adicionaClasse($classe, $nivel) {        
        $persoangemClasse = new PersonagemClasse;

        $persoangemClasse->personagem_id = $this->id;
        $persoangemClasse->classe_id = $classe;
        $persoangemClasse->nivel = $nivel;
        
        return $this->personagemClasses()->save($persoangemClasse);
    }

    /**
     * 
     * @return Array Retorna os Talentos relacionados ao personagem
     */
    public function _personagemTalentos() {
        return $this->personagemTalentos()->where('talentos.talentoHabilidade', 'talento');
    }

    /**
     * 
     * @return Array Retorna as Habilidades Especiais relacionados ao personagem
     */
    public function _personagemHabilidades() {
        return $this->personagemTalentos()->where('talentos.talentoHabilidade', 'habilidade');
    }

    /**
     * Retorna os talentos
     * @return Array Talentos cadastrados.
     */
    public function talentos() {
        return \DB::table('talentos')->where('talentoHabilidade', 'talento')->get();
    }

    /**
     * Retorna os talentos
     * @return Array Habilidades Especiais cadastrados.
     */
    public function habilidadesEspeciais() {
        return \DB::table('talentos')->where('talentoHabilidade', 'habilidade')->get();
    }

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
     * Retorna as Classes 
     * @return Array de Classes.
     */
    public function classes() {
        return \App\Classe::all();
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

    /**
     * Verifica se o valor do atributo e vario ou nulo     
     * @param string $valor Valor a ser verificado
     * @return string Retorna 0 se o atributo for vazio ou nulo
     */
    private function verificaAtributo($valor) {

        if (empty(str_replace(" ", "", $valor))) {
            return "0";
        } else {
            return $valor;
        }
    }

    /**
     * Set do atributo Idade
     * @param string $value Valor do atributo
     */
    public function setIdadeAttribute($value) {
        $this->attributes['idade'] = $this->verificaAtributo($value);
    }

    /**
     * Set do atributo Altura
     * @param string $value Valor do atributo
     */
    public function setAlturaAttribute($value) {
        $this->attributes['altura'] = $this->verificaAtributo($value);
    }

    /**
     * Set do atributo Peso
     * @param string $value Valor do atributo
     */
    public function setPesoAttribute($value) {
        $this->attributes['peso'] = $this->verificaAtributo($value);
    }

    /**
     * Set do atributo PV
     * @param string $value Valor do atributo
     */
    public function setPvAttribute($value) {
        $this->attributes['pv'] = $this->verificaAtributo($value);
    }

    /**
     * Set do atributo Resistencia Mágica
     * @param string $value Valor do atributo
     */
    public function setResistenciaMagicaAttribute($value) {
        $this->attributes['resistenciaMagica'] = $this->verificaAtributo($value);
    }

    /**
     * Set do atributo Força
     * @param string $value Valor do atributo
     */
    public function setForcaAttribute($value) {
        $this->attributes['forca'] = $this->verificaAtributo($value);
    }

    /**
     * Set do atributo Destreza
     * @param string $value Valor do atributo
     */
    public function setDestrezaAttribute($value) {
        $this->attributes['destreza'] = $this->verificaAtributo($value);
    }

    /**
     * Set do atributo Constituicao
     * @param string $value Valor do atributo
     */
    public function setConstituicaoAttribute($value) {
        $this->attributes['constituicao'] = $this->verificaAtributo($value);
    }

    /**
     * Set do atributo Inteligencia
     * @param string $value Valor do atributo
     */
    public function setInteligenciaAttribute($value) {
        $this->attributes['inteligencia'] = $this->verificaAtributo($value);
    }

    /**
     * Set do atributo Sabedoria
     * @param string $value Valor do atributo
     */
    public function setSabedoriaAttribute($value) {
        $this->attributes['sabedoria'] = $this->verificaAtributo($value);
    }

    /**
     * Set do atributo Carisma
     * @param string $value Valor do atributo
     */
    public function setCarismaAttribute($value) {
        $this->attributes['carisma'] = $this->verificaAtributo($value);
    }

    /**
     * Set do atributo Modificador Força
     * @param string $value Valor do atributo
     */
    public function setModForcaAttribute($value) {
        $this->attributes['modForca'] = $this->verificaAtributo($value);
    }

    /**
     * Set do atributo Modificador Destreza
     * @param string $value Valor do atributo
     */
    public function setModDestrezaAttribute($value) {
        $this->attributes['modDestreza'] = $this->verificaAtributo($value);
    }

    /**
     * Set do atributo Modificador Constituicao
     * @param string $value Valor do atributo
     */
    public function setModConstituicaoAttribute($value) {
        $this->attributes['modConstituicao'] = $this->verificaAtributo($value);
    }

    /**
     * Set do atributo Modificador Inteligencia
     * @param string $value Valor do atributo
     */
    public function setModInteligenciaAttribute($value) {
        $this->attributes['modInteligencia'] = $this->verificaAtributo($value);
    }

    /**
     * Set do atributo Modificador Sabedoria
     * @param string $value Valor do atributo
     */
    public function setModSabedoriaAttribute($value) {
        $this->attributes['modSabedoria'] = $this->verificaAtributo($value);
    }

    /**
     * Set do atributo Modificador Carisma
     * @param string $value Valor do atributo
     */
    public function setModCarismaAttribute($value) {
        $this->attributes['modCarisma'] = $this->verificaAtributo($value);
    }

    /**
     * Set do atributo Fortitude
     * @param string $value Valor do atributo
     */
    public function setFortitudeAttribute($value) {
        $this->attributes['fortitude'] = $this->verificaAtributo($value);
    }

    /**
     * Set do atributo Reflexo
     * @param string $value Valor do atributo
     */
    public function setReflexoAttribute($value) {
        $this->attributes['reflexo'] = $this->verificaAtributo($value);
    }

    /**
     * Set do atributo Vontade
     * @param string $value Valor do atributo
     */
    public function setVontadeAttribute($value) {
        $this->attributes['vontade'] = $this->verificaAtributo($value);
    }

    /**
     * Set do atributo Modificador Fortitude
     * @param string $value Valor do atributo
     */
    public function setModFortitudeAttribute($value) {
        $this->attributes['modFortitude'] = $this->verificaAtributo($value);
    }

    /**
     * Set do atributo Modificador Reflexo
     * @param string $value Valor do atributo
     */
    public function setModReflexoAttribute($value) {
        $this->attributes['modReflexo'] = $this->verificaAtributo($value);
    }

    /**
     * Set do atributo Modificador Vontade
     * @param string $value Valor do atributo
     */
    public function setModVontadeAttribute($value) {
        $this->attributes['modVontade'] = $this->verificaAtributo($value);
    }

    /**
     * Set do atributo Habilidade Fortitude
     * @param string $value Valor do atributo
     */
    public function setHabFortitudeAttribute($value) {
        $this->attributes['habFortitude'] = $this->verificaAtributo($value);
    }

    /**
     * Set do atributo Habilidade Reflexo
     * @param string $value Valor do atributo
     */
    public function setHabReflexoAttribute($value) {
        $this->attributes['habReflexo'] = $this->verificaAtributo($value);
    }

    /**
     * Set do atributo Habilidade Vontade
     * @param string $value Valor do atributo
     */
    public function setHabVontadeAttribute($value) {
        $this->attributes['habVontade'] = $this->verificaAtributo($value);
    }

    /**
     * Set do atributo Modificador Mágico Fortitude
     * @param string $value Valor do atributo
     */
    public function setMagicoFortitudeAttribute($value) {
        $this->attributes['magicoFortitude'] = $this->verificaAtributo($value);
    }

    /**
     * Set do atributo Modificador Mágico Reflexo
     * @param string $value Valor do atributo
     */
    public function setMagicoReflexoAttribute($value) {
        $this->attributes['magicoReflexo'] = $this->verificaAtributo($value);
    }

    /**
     * Set do atributo Modificador Mágico Vontade
     * @param string $value Valor do atributo
     */
    public function setMagicoVontadeAttribute($value) {
        $this->attributes['magicoVontade'] = $this->verificaAtributo($value);
    }

    /**
     * Set do atributo Outros Fortitude
     * @param string $value Valor do atributo
     */
    public function setOutrosFortitudeAttribute($value) {
        $this->attributes['outrosFortitude'] = $this->verificaAtributo($value);
    }

    /**
     * Set do atributo Outros Reflexo
     * @param string $value Valor do atributo
     */
    public function setOutrosReflexoAttribute($value) {
        $this->attributes['magicoReflexo'] = $this->verificaAtributo($value);
    }

    /**
     * Set do atributo Outros Vontade
     * @param string $value Valor do atributo
     */
    public function setOutrosVontadeAttribute($value) {
        $this->attributes['magicoVontade'] = $this->verificaAtributo($value);
    }

    /**
     * Set do atributo CA
     * @param string $value Valor do atributo
     */
    public function setCaAttribute($value) {
        $this->attributes['ca'] = $this->verificaAtributo($value);
    }

    /**
     * Set do atributo CA Armadura
     * @param string $value Valor do atributo
     */
    public function setArmaduraCaAttribute($value) {
        $this->attributes['armaduraCa'] = $this->verificaAtributo($value);
    }

    /**
     * Set do atributo CA Escudo
     * @param string $value Valor do atributo
     */
    public function setEscudoCaAttribute($value) {
        $this->attributes['escudoCa'] = $this->verificaAtributo($value);
    }

    /**
     * Set do atributo CA Destreza
     * @param string $value Valor do atributo
     */
    public function setDestrezaCaAttribute($value) {
        $this->attributes['destrezaCa'] = $this->verificaAtributo($value);
    }

    /**
     * Set do atributo CA Tamanho
     * @param string $value Valor do atributo
     */
    public function setTamanhoCaAttribute($value) {
        $this->attributes['tamanhoCa'] = $this->verificaAtributo($value);
    }

    /**
     * Set do atributo CA Armadura Natural
     * @param string $value Valor do atributo
     */
    public function setArmaduraNaturalCaAttribute($value) {
        $this->attributes['armaduraNaturalCa'] = $this->verificaAtributo($value);
    }

    /**
     * Set do atributo CA Deflexao
     * @param string $value Valor do atributo
     */
    public function setDeflexaoCaAttribute($value) {
        $this->attributes['deflexaoCa'] = $this->verificaAtributo($value);
    }

    /**
     * Set do atributo CA Outros
     * @param string $value Valor do atributo
     */
    public function setOutrosCaAttribute($value) {
        $this->attributes['outrosCa'] = $this->verificaAtributo($value);
    }

    /**
     * Set do atributo Iniciativa
     * @param string $value Valor do atributo
     */
    public function setIniciativaAttribute($value) {
        $this->attributes['iniciativa'] = $this->verificaAtributo($value);
    }

    /**
     * Set do atributo Modificador Destreza Iniciativa
     * @param string $value Valor do atributo
     */
    public function setModDestrezaIniciativaAttribute($value) {
        $this->attributes['modDestrezaIniciativa'] = $this->verificaAtributo($value);
    }

    /**
     * Set do atributo Outros Iniciativa
     * @param string $value Valor do atributo
     */
    public function setOutrosIniciativaAttribute($value) {
        $this->attributes['outrosIniciativa'] = $this->verificaAtributo($value);
    }

    /**
     * Set do atributo Toque
     * @param string $value Valor do atributo
     */
    public function setToqueAttribute($value) {
        $this->attributes['toque'] = $this->verificaAtributo($value);
    }

    /**
     * Set do atributo Surpresa
     * @param string $value Valor do atributo
     */
    public function setSurpresaAttribute($value) {
        $this->attributes['surpresa'] = $this->verificaAtributo($value);
    }

    /**
     * Set do atributo BBA
     * @param string $value Valor do atributo
     */
    public function setBbaAttribute($value) {
        $this->attributes['bba'] = $this->verificaAtributo($value);
    }

    /**
     * Set do atributo Agarrar
     * @param string $value Valor do atributo
     */
    public function setAgarrarAttribute($value) {
        $this->attributes['agarrar'] = $this->verificaAtributo($value);
    }

    /**
     * Set do atributo Modificador Agarrar
     * @param string $value Valor do atributo
     */
    public function setModAgarrarAttribute($value) {
        $this->attributes['modAgarrar'] = $this->verificaAtributo($value);
    }

    /**
     * Set do atributo Força Agarrar
     * @param string $value Valor do atributo
     */
    public function setForcaAgarrarAttribute($value) {
        $this->attributes['forcaAgarrar'] = $this->verificaAtributo($value);
    }

    /**
     * Set do atributo Tamanho Agarrar
     * @param string $value Valor do atributo
     */
    public function setTamanhoAgarrarAttribute($value) {
        $this->attributes['tamanhoAgarrar'] = $this->verificaAtributo($value);
    }

    /**
     * Set do atributo Outros Agarrar
     * @param string $value Valor do atributo
     */
    public function setOutrosAgarrarAttribute($value) {
        $this->attributes['outrosAgarrar'] = $this->verificaAtributo($value);
    }

}
