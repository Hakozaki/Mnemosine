@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 ">
            <div class="panel panel-default">             
                <div class="breadcrumb panel-heading">
                    <li><a href="{{ route('personagem.index') }}">Personagem</a></li>
                    <li class="active">Detalhe</li>
                </div>

                <div class="panel-body">
                    <form action=" {{ route('personagem.salvar') }} " method="post">
                        {{ csrf_field() }}
                        <input name="id" type="hidden" value="{{$personagem->id}}"/>                        
                        <input name="jogador_id" type="hidden" value="{{ Auth::user()->id }}"/>                        

                        <div class="row">
                            <div class="form-group col-md-7 {{ $errors->has('nome') ? 'has-error' : '' }}">
                                <label for="nome">Nome:</label>
                                <input type="text" name="nome" class="form-control" value="{{ $personagem->nome }}" placeholder="Nome">
                                @if($errors->has('nome'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('nome') }}</strong>								
                                </span>
                                @endif
                            </div>

                            <div class="form-group col-md-5{{ $errors->has('pv') ? 'has-error' : '' }}">
                                <label for="pv">P.V:</label>
                                <input type="text" name="pv" class="form-control" value="{{ $personagem->pv }}" placeholder="Pontos de vida">
                                @if($errors->has('pv'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('pv') }}</strong>								
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-3 {{ $errors->has('idade') ? 'has-error' : '' }}">
                                <label for="idade">Idade:</label>
                                <input type="text" name="idade" class="form-control" value="{{ $personagem->idade }}" placeholder="Idade">
                                @if($errors->has('idade'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('idade') }}</strong>								
                                </span>
                                @endif
                            </div>

                            <div class="form-group col-md-3 {{ $errors->has('sexo') ? 'has-error' : '' }}" >
                                <label for="sexo">Sexo:</label>

                                <select name="sexo" class="form-control selectpicker" data-live-search="true" value="{{ $personagem->sexo }}">                                                                   
                                    <option value="Masculino"  <?php 'Masculino' == $personagem->sexo ? 'selected' : ''; ?> class="form-control" data-tokens="Masculino">Maculino</option>                                
                                    <option value="Feminino"  <?php 'Feminino' == $personagem->sexo ? 'selected' : ''; ?> class="form-control" data-tokens="Feminino">Feminino</option>                                
                                </select>

                                @if($errors->has('sexo'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('sexo') }}</strong>								
                                </span>
                                @endif
                            </div>                                                

                            <div class="form-group col-md-3 {{ $errors->has('tendencia') ? 'has-error' : '' }}" >
                                <label for="tendencia">Tendência:</label>

                                <select name="tendencia" class="form-control selectpicker" data-live-search="true" value="{{ $personagem->tendencia }}">                                   
                                    @foreach($personagem->tendencias() as $key => $tendencia)                                                                
                                    <option value="{{$key}}"  <?php echo $key == $personagem->tendencia ? 'selected' : ''; ?> class="form-control" data-tokens="{{ $tendencia }}">{{ $tendencia }}</option>                                
                                    @endforeach
                                </select>

                                @if($errors->has('tendencia'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('tendencia') }}</strong>								
                                </span>
                                @endif
                            </div>

                            <div class="form-group col-md-3 {{ $errors->has('alinhamento') ? 'has-error' : '' }}" >
                                <label for="alinhamento">Alinhamento:</label>

                                <select name="alinhamento" class="form-control selectpicker" data-live-search="true" value="{{ $personagem->alinhamento }}">                                   
                                    @foreach($personagem->alinhamentos() as $key => $alinhamento)                                                                
                                    <option value="{{$key}}"  <?php echo $key == $personagem->alinhamento ? 'selected' : ''; ?> class="form-control" data-tokens="{{ $alinhamento }}">{{ $alinhamento }}</option>                                
                                    @endforeach
                                </select>

                                @if($errors->has('alinhamento'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('alinhamento') }}</strong>								
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-md-3 {{ $errors->has('raca_id') ? 'has-error' : '' }}" >
                                <label for="raca_id">Raça:</label>

                                <select name="raca_id" class="form-control selectpicker" data-live-search="true" value="{{ $personagem->raca_id }}">                                   
                                    @foreach($personagem->racas() as $raca)                                                                
                                    <option value="{{$raca->id}}"  <?php echo $key == $personagem->raca_id ? 'selected' : ''; ?> class="form-control" data-tokens="{{ $raca->nome }}">{{ $raca->nome }}</option>                                
                                    @endforeach
                                </select>

                                @if($errors->has('raca_id'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('raca_id') }}</strong>								
                                </span>
                                @endif
                            </div>

                            <div class="form-group col-md-3 {{ $errors->has('altura') ? 'has-error' : '' }}">
                                <label for="altura">Altura:</label>
                                <input type="text" name="altura" class="form-control" value="{{ $personagem->altura }}" placeholder="Altura do personagem">
                                @if($errors->has('altura'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('altura') }}</strong>								
                                </span>
                                @endif
                            </div>

                            <div class="form-group col-md-3 {{ $errors->has('peso') ? 'has-error' : '' }}">
                                <label for="peso">Peso:</label>
                                <input type="text" name="peso" class="form-control" value="{{ $personagem->peso }}" placeholder="Peso do personagem">
                                @if($errors->has('peso'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('peso') }}</strong>								
                                </span>
                                @endif
                            </div>

                            <div class="form-group col-md-3 {{ $errors->has('tamanho') ? 'has-error' : '' }}" >
                                <label for="tamanho">Tamanho</label>
                                <select name="tamanho" class="form-control selectpicker" data-live-search="true" value="{{ $personagem->sexo }}">                                                                                                   
                                    <option value="miudo"  <?php 'miudo' == $personagem->sexo ? 'selected' : ''; ?> class="form-control" data-tokens="miudo">Miúdo</option>                                
                                    <option value="pequeno"  <?php 'pequeno' == $personagem->sexo ? 'selected' : ''; ?> class="form-control" data-tokens="pequeno">Pequeno</option>                                
                                    <option value="medio"  <?php 'medio' == $personagem->sexo ? 'selected' : ''; ?> class="form-control" data-tokens="medio">Médio</option>                                
                                    <option value="grande"  <?php 'grande' == $personagem->sexo ? 'selected' : ''; ?> class="form-control" data-tokens="grande">Grande</option>                                
                                    <option value="enorme"  <?php 'enorme' == $personagem->sexo ? 'selected' : ''; ?> class="form-control" data-tokens="enorme">Enorme</option>                                
                                    <option value="imenso"  <?php 'imenso' == $personagem->sexo ? 'selected' : ''; ?> class="form-control" data-tokens="imenso">Imenso</option>                                
                                </select>

                                @if($errors->has('tamanho'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('tamanho') }}</strong>								
                                </span>
                                @endif
                            </div>    
                        </div>
                        <div class="row">
                            <div class="form-group col-md-3 {{ $errors->has('olhos') ? 'has-error' : '' }}">
                                <label for="olhos">Olhos:</label>
                                <input type="text" name="olhos" class="form-control" value="{{ $personagem->olhos }}" placeholder="Cor dos olhos">
                                @if($errors->has('olhos'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('olhos') }}</strong>								
                                </span>
                                @endif
                            </div>

                            <div class="form-group col-md-3 {{ $errors->has('cabelo') ? 'has-error' : '' }}">
                                <label for="cabelo">Cabelo:</label>
                                <input type="text" name="cabelo" class="form-control" value="{{ $personagem->cabelo }}" placeholder="Cor dos cabelos">
                                @if($errors->has('cabelo'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('cabelo') }}</strong>								
                                </span>
                                @endif
                            </div>

                            <div class="form-group col-md-3 {{ $errors->has('pele') ? 'has-error' : '' }}">
                                <label for="pele">Pele:</label>
                                <input type="text" name="pele" class="form-control" value="{{ $personagem->pele }}" placeholder="Cor da pele">
                                @if($errors->has('pele'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('pele') }}</strong>								
                                </span>
                                @endif
                            </div>

                            <div class="form-group col-md-3 {{ $errors->has('divindade_id') ? 'has-error' : '' }}" >
                                <label for="divindade_id">Divindade:</label>

                                <select name="divindade_id" class="form-control selectpicker" data-live-search="true" value="{{ $personagem->divindade_id }}">                                   
                                    @foreach($personagem->divindades() as $divindade)                                                                
                                    <option value="{{$divindade->id}}"  <?php echo $key == $personagem->divindade_id ? 'selected' : ''; ?> class="form-control" data-tokens="{{ $divindade->nome }}">{{ $divindade->nome }}</option>                                
                                    @endforeach
                                </select>

                                @if($errors->has('divindade_id'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('divindade_id') }}</strong>								
                                </span>
                                @endif
                            </div>
                        </div><!-- CABEÇALHO -->                                             

                        <div class="row">
                            <div class="row col-md-6">
                                <div class="form-group col-md-6 {{ $errors->has('forca') ? 'has-error' : '' }}">
                                    <label for="forca">Força:</label>
                                    <input type="text" name="forca" class="form-control" value="{{ $personagem->forca }}" placeholder="Força">
                                    @if($errors->has('forca'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('forca') }}</strong>								
                                    </span>
                                    @endif
                                </div>

                                <div class="form-group col-md-6 {{ $errors->has('modForca') ? 'has-error' : '' }}">
                                    <label for="modForca">Mod.Força:</label>
                                    <input type="text" name="modForca" class="form-control" value="{{ $personagem->modForca }}" placeholder="Modificador de Força">
                                    @if($errors->has('modForca'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('modForca') }}</strong>								
                                    </span>
                                    @endif
                                </div>

                                <div class="form-group col-md-6 {{ $errors->has('destreza') ? 'has-error' : '' }}">
                                    <label for="destreza">Destreza:</label>
                                    <input type="text" name="destreza" class="form-control" value="{{ $personagem->destreza }}" placeholder="Destreza">
                                    @if($errors->has('destreza'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('destreza') }}</strong>								
                                    </span>
                                    @endif
                                </div>

                                <div class="form-group col-md-6 {{ $errors->has('modDestreza') ? 'has-error' : '' }}">
                                    <label for="modDestreza">Mod.Destreza:</label>
                                    <input type="text" name="modDestreza" class="form-control" value="{{ $personagem->modDestreza }}" placeholder="Modificador de Destreza">
                                    @if($errors->has('modDestreza'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('modDestreza') }}</strong>								
                                    </span>
                                    @endif
                                </div>

                                <div class="form-group col-md-6 {{ $errors->has('constituicao') ? 'has-error' : '' }}">
                                    <label for="constituicao">Constituição:</label>
                                    <input type="text" name="constituicao" class="form-control" value="{{ $personagem->constituicao }}" placeholder="Constituição">
                                    @if($errors->has('constituicao'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('constituicao') }}</strong>								
                                    </span>
                                    @endif
                                </div>

                                <div class="form-group col-md-6 {{ $errors->has('modConstituicao') ? 'has-error' : '' }}">
                                    <label for="modConstituicao">Mod.Constituição:</label>
                                    <input type="text" name="modConstituicao" class="form-control" value="{{ $personagem->modConstituicao }}" placeholder="Modificador de Constituição">
                                    @if($errors->has('modConstituicao'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('modConstituicao') }}</strong>								
                                    </span>
                                    @endif
                                </div>

                                <div class="form-group col-md-6 {{ $errors->has('inteligencia') ? 'has-error' : '' }}">
                                    <label for="inteligencia">Inteligência:</label>
                                    <input type="text" name="inteligencia" class="form-control" value="{{ $personagem->inteligencia }}" placeholder="Inteligência">
                                    @if($errors->has('inteligencia'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('inteligencia') }}</strong>								
                                    </span>
                                    @endif
                                </div>

                                <div class="form-group col-md-6 {{ $errors->has('modInteligencia') ? 'has-error' : '' }}">
                                    <label for="modInteligencia">Mod.Inteligência:</label>
                                    <input type="text" name="modInteligencia" class="form-control" value="{{ $personagem->modInteligencia }}" placeholder="Modificador de Inteligência">
                                    @if($errors->has('modInteligencia'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('modInteligencia') }}</strong>								
                                    </span>
                                    @endif
                                </div>

                                <div class="form-group col-md-6 {{ $errors->has('sabedoria') ? 'has-error' : '' }}">
                                    <label for="sabedoria">Sabedoria:</label>
                                    <input type="text" name="sabedoria" class="form-control" value="{{ $personagem->sabedoria }}" placeholder="Sabedoria">
                                    @if($errors->has('sabedoria'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('sabedoria') }}</strong>								
                                    </span>
                                    @endif
                                </div>

                                <div class="form-group col-md-6 {{ $errors->has('modSabedoria') ? 'has-error' : '' }}">
                                    <label for="modSabedoria">Mod.Sabedoria:</label>
                                    <input type="text" name="modSabedoria" class="form-control" value="{{ $personagem->modSabedoria }}" placeholder="Modificador de Sabedoria">
                                    @if($errors->has('modSabedoria'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('modSabedoria') }}</strong>								
                                    </span>
                                    @endif
                                </div>

                                <div class="form-group col-md-6 {{ $errors->has('carisma') ? 'has-error' : '' }}">
                                    <label for="carisma">Carisma:</label>
                                    <input type="text" name="carisma" class="form-control" value="{{ $personagem->carisma }}" placeholder="Carisma">
                                    @if($errors->has('carisma'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('carisma') }}</strong>								
                                    </span>
                                    @endif
                                </div>

                                <div class="form-group col-md-6 {{ $errors->has('modCarisma') ? 'has-error' : '' }}">
                                    <label for="modCarisma">Mod.Carisma:</label>
                                    <input type="text" name="modCarisma" class="form-control" value="{{ $personagem->modCarisma }}" placeholder="Modificador de Carisma">
                                    @if($errors->has('modCarisma'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('modCarisma') }}</strong>								
                                    </span>
                                    @endif
                                </div>
                            </div> <!-- LADO ESQUERDO (ATRIBUTOS) -->

                            <div class="row col-md-6">
                                <div class="form-group col-md-4 {{ $errors->has('iniciativa') ? 'has-error' : '' }}">
                                    <label for="iniciativa">Iniciativa:</label>
                                    <input type="text" name="iniciativa" class="form-control" value="{{ $personagem->iniciativa }}" placeholder="Bônus de iniciativa">
                                    @if($errors->has('iniciativa'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('iniciativa') }}</strong>								
                                    </span>
                                    @endif
                                </div>
                                <div class="form-group col-md-4 {{ $errors->has('modDestrezaIniciativa') ? 'has-error' : '' }}">
                                    <label for="modDestrezaIniciativa">Mod.Destreza:</label>
                                    <input type="text" name="modDestrezaIniciativa" class="form-control" value="{{ $personagem->modDestrezaIniciativa }}" placeholder="Modificador Destreza">
                                    @if($errors->has('modDestrezaIniciativa'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('modDestrezaIniciativa') }}</strong>								
                                    </span>
                                    @endif
                                </div>
                                <div class="form-group col-md-4 {{ $errors->has('outrosIniciativa') ? 'has-error' : '' }}">
                                    <label for="outrosIniciativa">Outros:</label>
                                    <input type="text" name="outrosIniciativa" class="form-control" value="{{ $personagem->outrosIniciativa }}" placeholder="Outros">
                                    @if($errors->has('outrosIniciativa'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('outrosIniciativa') }}</strong>								
                                    </span>
                                    @endif
                                </div>

                                <div class="form-group col-md-6 {{ $errors->has('toque') ? 'has-error' : '' }}">
                                    <label for="toque">Toque:</label>
                                    <input type="text" name="toque" class="form-control" value="{{ $personagem->toque }}" placeholder="Toque">
                                    @if($errors->has('toque'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('toque') }}</strong>								
                                    </span>
                                    @endif
                                </div>

                                <div class="form-group col-md-6 {{ $errors->has('surpresa') ? 'has-error' : '' }}">
                                    <label for="surpresa">Surpresa:</label>
                                    <input type="text" name="surpresa" class="form-control" value="{{ $personagem->surpresa }}" placeholder="Surpresa">
                                    @if($errors->has('surpresa'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('surpresa') }}</strong>								
                                    </span>
                                    @endif
                                </div>

                                <div class="form-group col-md-12 {{ $errors->has('bba') ? 'has-error' : '' }}">
                                    <label for="bba">B.B.A:</label>
                                    <input type="text" name="bba" class="form-control" value="{{ $personagem->bba }}" placeholder="Bônus base de ataque">
                                    @if($errors->has('bba'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('bba') }}</strong>								
                                    </span>
                                    @endif
                                </div>
                                <div class="form-group col-md-6 {{ $errors->has('reducaoDano') ? 'has-error' : '' }}">
                                    <label for="reducaoDano">Redução de dano:</label>
                                    <input type="text" name="reducaoDano" class="form-control" value="{{ $personagem->reducaoDano }}" placeholder="Redução de dano">
                                    @if($errors->has('reducaoDano'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('reducaoDano') }}</strong>								
                                    </span>
                                    @endif
                                </div>

                                <div class="form-group col-md-6 {{ $errors->has('resistenciaMagica') ? 'has-error' : '' }}">
                                    <label for="resistenciaMagica">Resistência mágica:</label>
                                    <input type="text" name="resistenciaMagica" class="form-control" value="{{ $personagem->resistenciaMagica }}" placeholder="Resistência mágica">
                                    @if($errors->has('resistenciaMagica'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('resistenciaMagica') }}</strong>								
                                    </span>
                                    @endif
                                </div>

                                <div class="form-group col-md-12 {{ $errors->has('deslocamento') ? 'has-error' : '' }}">
                                    <label for="deslocamento">Deslocamento:</label>
                                    <div class="input-group">
                                        <input type="text" name="deslocamento" class="form-control" value="{{ $personagem->deslocamento }}" placeholder="Deslocamento">
                                        <span class="input-group-addon">M</span>
                                    </div>
                                    @if($errors->has('deslocamento'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('deslocamento') }}</strong>								
                                    </span>
                                    @endif
                                </div>                                                                                           

                            </div><!-- LADO DIREITO -->
                        </div><!-- ESQUERDO(ATRIBUTOS) DIREITO(...)--> 
                        <div class="row">
                            <div class="form-group col-md-2 {{ $errors->has('ca') ? 'has-error' : '' }}">
                                <label for="ca">C.A:</label>
                                <input type="text" name="ca" class="form-control" value="{{ $personagem->ca }}" placeholder="Classe de armadura">
                                @if($errors->has('ca'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('ca') }}</strong>								
                                </span>
                                @endif
                            </div>

                            <div class="form-group col-md-2 {{ $errors->has('armaduraCa') ? 'has-error' : '' }}">
                                <label for="armaduraCa">Armadura:</label>
                                <input type="text" name="armaduraCa" class="form-control" value="{{ $personagem->armaduraCa }}" placeholder="Bônus de armadura">
                                @if($errors->has('armaduraCa'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('armaduraCa') }}</strong>								
                                </span>
                                @endif
                            </div>

                            <div class="form-group col-md-2 {{ $errors->has('escudoCa') ? 'has-error' : '' }}">
                                <label for="escudoCa">Escudo:</label>
                                <input type="text" name="escudoCa" class="form-control" value="{{ $personagem->escudoCa }}" placeholder="Bônus de escudo">
                                @if($errors->has('escudoCa'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('escudoCa') }}</strong>								
                                </span>
                                @endif
                            </div>

                            <div class="form-group col-md-1 {{ $errors->has('destrezaCa') ? 'has-error' : '' }}">
                                <label for="destrezaCa">Destreza:</label>
                                <input type="text" name="destrezaCa" class="form-control" value="{{ $personagem->destrezaCa }}" placeholder="Bônus de destreza">
                                @if($errors->has('destrezaCa'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('destrezaCa') }}</strong>								
                                </span>
                                @endif
                            </div>

                            <div class="form-group col-md-1 {{ $errors->has('tamanhoCa') ? 'has-error' : '' }}">
                                <label for="tamanhoCa">Tamanho:</label>
                                <input type="text" name="tamanhoCa" class="form-control" value="{{ $personagem->tamanhoCa }}" placeholder="Modificador de tamanho">
                                @if($errors->has('tamanhoCa'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('tamanhoCa') }}</strong>								
                                </span>
                                @endif
                            </div>

                            <div class="form-group col-md-2 {{ $errors->has('armaduraNaturalCa') ? 'has-error' : '' }}">
                                <label for="armaduraNaturalCa">Armadura Natural:</label>
                                <input type="text" name="armaduraNaturalCa" class="form-control" value="{{ $personagem->armaduraNaturalCa }}" placeholder="Bônus de armadura natural">
                                @if($errors->has('armaduraNaturalCa'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('armaduraNaturalCa') }}</strong>								
                                </span>
                                @endif
                            </div>

                            <div class="form-group col-md-1 {{ $errors->has('deflexaoCa') ? 'has-error' : '' }}">
                                <label for="deflexaoCa">Deflexão:</label>
                                <input type="text" name="deflexaoCa" class="form-control" value="{{ $personagem->deflexaoCa }}" placeholder="Bônus de deflexão natural">
                                @if($errors->has('deflexaoCa'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('deflexaoCa') }}</strong>								
                                </span>
                                @endif
                            </div>

                            <div class="form-group col-md-1 {{ $errors->has('outrosCa') ? 'has-error' : '' }}">
                                <label for="outrosCa">Outros:</label>
                                <input type="text" name="outrosCa" class="form-control" value="{{ $personagem->outrosCa }}" placeholder="Outros bônus">
                                @if($errors->has('outrosCa'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('outrosCa') }}</strong>								
                                </span>
                                @endif
                            </div>
                        </div><!-- C.A -->

                        <div class="row">
                            <div class="form-group col-md-4{{ $errors->has('fortitude') ? 'has-error' : '' }}">
                                <label for="fortitude">Fortitude:</label>
                                <input type="text" name="fortitude" class="form-control" value="{{ $personagem->fortitude }}" placeholder="Fortiturde">
                                @if($errors->has('fortitude'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('fortitude') }}</strong>								
                                </span>
                                @endif
                            </div>

                            <div class="form-group col-md-2{{ $errors->has('modFortitude') ? 'has-error' : '' }}">
                                <label for="modFortitude">Mod.Fortitude:</label>
                                <input type="text" name="modFortitude" class="form-control" value="{{ $personagem->modFortitude }}" placeholder="Modificador Fortiturde">
                                @if($errors->has('modFortitude'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('modFortitude') }}</strong>								
                                </span>
                                @endif
                            </div>

                            <div class="form-group col-md-2{{ $errors->has('habFortitude') ? 'has-error' : '' }}">
                                <label for="habFortitude">Hab.Fortitude:</label>
                                <input type="text" name="habFortitude" class="form-control" value="{{ $personagem->habFortitude }}" placeholder="Habilidade Fortiturde">
                                @if($errors->has('habFortitude'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('habFortitude') }}</strong>								
                                </span>
                                @endif
                            </div>

                            <div class="form-group col-md-2{{ $errors->has('magicoFortitude') ? 'has-error' : '' }}">
                                <label for="magicoFortitude">Mágico Fortitude:</label>
                                <input type="text" name="magicoFortitude" class="form-control" value="{{ $personagem->magicoFortitude }}" placeholder="Mágico Fortiturde">
                                @if($errors->has('magicoFortitude'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('magicoFortitude') }}</strong>								
                                </span>
                                @endif
                            </div>

                            <div class="form-group col-md-2{{ $errors->has('outrosFortitude') ? 'has-error' : '' }}">
                                <label for="outrosFortitude">Outros Fortitude:</label>
                                <input type="text" name="outrosFortitude" class="form-control" value="{{ $personagem->outrosFortitude }}" placeholder="Outros Fortiturde">
                                @if($errors->has('outrosFortitude'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('outrosFortitude') }}</strong>								
                                </span>
                                @endif
                            </div>
                        </div> <!-- Fortitude -->
                        <div class="row">
                            <div class="form-group col-md-4 {{ $errors->has('reflexos') ? 'has-error' : '' }}">
                                <label for="reflexos">Reflexo:</label>
                                <input type="text" name="reflexos" class="form-control" value="{{ $personagem->reflexos }}" placeholder="Reflexos">
                                @if($errors->has('reflexos'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('reflexos') }}</strong>								
                                </span>
                                @endif
                            </div>

                            <div class="form-group col-md-2 {{ $errors->has('modReflexos') ? 'has-error' : '' }}">
                                <label for="modReflexos">Mod.Reflexo:</label>
                                <input type="text" name="modReflexos" class="form-control" value="{{ $personagem->modReflexos }}" placeholder="Modificador Reflexo">
                                @if($errors->has('modReflexos'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('modReflexos') }}</strong>								
                                </span>
                                @endif
                            </div>

                            <div class="form-group col-md-2 {{ $errors->has('habReflexos') ? 'has-error' : '' }}">
                                <label for="habReflexos">Hab.Reflexo:</label>
                                <input type="text" name="habReflexos" class="form-control" value="{{ $personagem->habReflexos }}" placeholder="Habilidade Reflexo">
                                @if($errors->has('habReflexos'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('habReflexos') }}</strong>								
                                </span>
                                @endif
                            </div>

                            <div class="form-group col-md-2 {{ $errors->has('magicoReflexos') ? 'has-error' : '' }}">
                                <label for="magicoReflexos">Mágico Reflexo:</label>
                                <input type="text" name="magicoReflexos" class="form-control" value="{{ $personagem->magicoReflexos }}" placeholder="Mágico Reflexo">
                                @if($errors->has('magicoReflexos'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('magicoReflexos') }}</strong>								
                                </span>
                                @endif
                            </div>

                            <div class="form-group col-md-2 {{ $errors->has('outrosReflexos') ? 'has-error' : '' }}">
                                <label for="outrosReflexos">Outros Reflexo:</label>
                                <input type="text" name="outrosReflexos" class="form-control" value="{{ $personagem->outrosReflexos }}" placeholder="Outros Reflexo">
                                @if($errors->has('outrosReflexos'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('outrosReflexos') }}</strong>								
                                </span>
                                @endif
                            </div>
                        </div> <!-- Reflexo -->
                        <div class="row">
                            <div class="form-group col-md-4 {{ $errors->has('vontade') ? 'has-error' : '' }}">
                                <label for="vontade">Vontade:</label>
                                <input type="text" name="vontade" class="form-control" value="{{ $personagem->vontade }}" placeholder="Vontade">
                                @if($errors->has('vontade'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('vontade') }}</strong>								
                                </span>
                                @endif
                            </div>
                            <div class="form-group col-md-2 {{ $errors->has('modVontade') ? 'has-error' : '' }}">
                                <label for="modVontade">Mod.Vontade:</label>
                                <input type="text" name="modVontade" class="form-control" value="{{ $personagem->modVontade }}" placeholder="Modificador Vontade">
                                @if($errors->has('modVontade'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('modVontade') }}</strong>								
                                </span>
                                @endif
                            </div>
                            <div class="form-group col-md-2 {{ $errors->has('habVontade') ? 'has-error' : '' }}">
                                <label for="habVontade">Hab.Vontade:</label>
                                <input type="text" name="habVontade" class="form-control" value="{{ $personagem->habVontade }}" placeholder="Habilidade Vontade">
                                @if($errors->has('habVontade'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('habVontade') }}</strong>								
                                </span>
                                @endif
                            </div>

                            <div class="form-group col-md-2 {{ $errors->has('magicoVontade') ? 'has-error' : '' }}">
                                <label for="magicoVontade">Mágico Vontade:</label>
                                <input type="text" name="magicoVontade" class="form-control" value="{{ $personagem->magicoVontade }}" placeholder="Mágico Vontade">
                                @if($errors->has('magicoVontade'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('magicoVontade') }}</strong>								
                                </span>
                                @endif
                            </div>

                            <div class="form-group col-md-2 {{ $errors->has('outrosVontade') ? 'has-error' : '' }}">
                                <label for="outrosVontade">Outros Vontade:</label>
                                <input type="text" name="outrosVontade" class="form-control" value="{{ $personagem->outrosVontade }}" placeholder="Outros Vontade">
                                @if($errors->has('outrosVontade'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('outrosVontade') }}</strong>								
                                </span>
                                @endif
                            </div>
                        </div><!-- Vontade -->

                        <div class="row">
                            <div class="form-group col-md-4 {{ $errors->has('agarrar') ? 'has-error' : '' }}">
                                <label for="agarrar">Aguarrar:</label>
                                <input type="text" name="agarrar" class="form-control" value="{{ $personagem->agarrar }}" placeholder="Bônus aguarrar">
                                @if($errors->has('agarrar'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('agarrar') }}</strong>								
                                </span>
                                @endif
                            </div>

                            <div class="form-group col-md-2 {{ $errors->has('modAgarrar') ? 'has-error' : '' }}">
                                <label for="modAgarrar">Mod.Aguarrar:</label>
                                <input type="text" name="modAgarrar" class="form-control" value="{{ $personagem->modAgarrar }}" placeholder="Modificador aguarrar">
                                @if($errors->has('modAgarrar'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('modAgarrar') }}</strong>								
                                </span>
                                @endif
                            </div>

                            <div class="form-group col-md-2 {{ $errors->has('forcaAgarrar') ? 'has-error' : '' }}">
                                <label for="forcaAgarrar">Força:</label>
                                <input type="text" name="forcaAgarrar" class="form-control" value="{{ $personagem->forcaAgarrar }}" placeholder="Modificador força aguarrar">
                                @if($errors->has('forcaAgarrar'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('forcaAgarrar') }}</strong>								
                                </span>
                                @endif
                            </div>

                            <div class="form-group col-md-2 {{ $errors->has('tamanhoAgarrar') ? 'has-error' : '' }}">
                                <label for="tamanhoAgarrar">Tamanho:</label>
                                <input type="text" name="tamanhoAgarrar" class="form-control" value="{{ $personagem->tamanhoAgarrar }}" placeholder="Modificador tamanho aguarrar">
                                @if($errors->has('tamanhoAgarrar'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('tamanhoAgarrar') }}</strong>								
                                </span>
                                @endif
                            </div>

                            <div class="form-group col-md-2 {{ $errors->has('outrosAgarrar') ? 'has-error' : '' }}">
                                <label for="outrosAgarrar">Outros:</label>
                                <input type="text" name="outrosAgarrar" class="form-control" value="{{ $personagem->outrosAgarrar }}" placeholder="Modificador outros aguarrar">
                                @if($errors->has('outrosAgarrar'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('outrosAgarrar') }}</strong>								
                                </span>
                                @endif
                            </div>
                        </div>
                        <button class="btn btn-info">Salvar</a>                            
                    </form>
                </div> <!-- panel-body -->
            </div><!-- panel-default -->
        </div><!-- panel col-md-12 -->
    </div>
</div>
@endsection
