@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 ">
            <div class="panel panel-default">             
                <div class="breadcrumb panel-heading">
                    <li><a href="{{ route('magia.index') }}">Magia</a></li>
                    <li class="active">Detalhe</li>
                </div>

                <div class="panel-body">
                    <form action=" {{ route('magia.salvar') }} " method="post">
                        {{ csrf_field() }}
                        <input name="id" type="hidden" value="{{$magia->id}}"/>                        

                        <div class="form-group {{ $errors->has('nome') ? 'has-error' : '' }}">
                            <label for="nome">Nome:</label>
                            <input type="text" name="nome" class="form-control" value="{{ $magia->nome }}" placeholder="Magia">
                            @if($errors->has('nome'))
                            <span class="help-block">
                                <strong>{{ $errors->first('nome') }}</strong>								
                            </span>
                            @endif
                        </div> 

                        <div class="form-group {{ $errors->has('descricao') ? 'has-error' : '' }}">
                            <label for="descricao">Descrição:</label>
                            <textarea type="text" style="max-width:100%" name="descricao" class="form-control" rows="7" value="{{ $magia->descricao }}" placeholder="Descrição da Magia">{{ $magia->descricao }}</textarea>
                            @if($errors->has('descricao'))
                            <span class="help-block">
                                <strong>{{ $errors->first('descricao') }}</strong>								
                            </span>
                            @endif
                        </div> 
                        <div class="row">
                            <div class="form-group col-sm-3 {{ $errors->has('escola') ? 'has-error' : '' }}" >
                                <label for="escola">Escola:</label>

                                <select id="escola"  name="escola" class="form-control selectpicker" data-live-search="true" value="{{ $magia->escola }}">   
                                    <option class="form-control" ></option>
                                    @foreach($magia->escolas() as $key => $escola)                                                                
                                    <option value="{{$key}}"  <?php echo $key == $magia->escola ? 'selected' : ''; ?> class="form-control" data-tokens="{{ $escola }}">{{ $escola }}</option>                                
                                    @endforeach
                                </select>

                                @if($errors->has('escola'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('escola') }}</strong>								
                                </span>
                                @endif
                            </div>
                            <div class="form-group col-sm-3 {{ $errors->has('subEscola') ? 'has-error' : '' }}" >
                                <label for="subEscola">Sub-escola:</label>

                                <select id="subEscola" name="subEscola" class="form-control selectpicker" data-live-search="true" value="{{ $magia->subescola }}">   
                                    <option class="form-control" ></option>                                                                             
                                    @foreach($magia->subescolas() as $key => $subEscola)                                                                
                                    <option value="{{$key}}"  <?php echo $key == $magia->subEscola ? 'selected' : ''; ?> class="form-control" data-tokens="{{ $subEscola }}">{{ $subEscola }}</option>                                
                                    @endforeach
                                </select>

                                @if($errors->has('subEscola'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('subEscola') }}</strong>								
                                </span>
                                @endif
                            </div>

                            <div class="form-group col-sm-3 {{ $errors->has('descritor') ? 'has-error' : '' }}" >
                                <label for="descritor">Descritor:</label>

                                <select name="descritor" class="form-control selectpicker" data-live-search="true" value="{{ $magia->descritor }}">   
                                    <option class="form-control" ></option>                                                                             
                                    @foreach($magia->descritores() as $key => $descritor)                                                                
                                    <option value="{{$key}}"  <?php echo $key == $magia->descritor ? 'selected' : ''; ?> class="form-control" data-tokens="{{ $descritor }}">{{ $descritor }}</option>                                
                                    @endforeach
                                </select>

                                @if($errors->has('descritor'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('descritor') }}</strong>								
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="row ">
                            <div class="panel-heading ">Componentes</div>
                            <div class="form-group col-md-2 {{ $errors->has('componenteVisual') ? 'has-error' : '' }}">
                                <label for="nome">Visual:</label>
                                <input type="radio" name="componenteVisual" value="1" <?php echo 1 == $magia->componenteVisual ? 'checked' : ''; ?>>Sim
                                <input type="radio" name="componenteVisual" value="0" <?php echo 0 == $magia->componenteVisual ? 'checked' : ''; ?>>Não

                            </div> 
                            <div class="form-group col-sm-2 {{ $errors->has('componenteGestual') ? 'has-error' : '' }}">
                                <label for="nome">Gestual:</label>
                                <input type="radio" name="componenteGestual"  value="1" <?php echo 1 == $magia->componenteGestual ? 'checked' : ''; ?>>Sim
                                <input type="radio" name="componenteGestual"  value="0" <?php echo 0 == $magia->componenteGestual ? 'checked' : ''; ?>>Não
                            </div> 
                            <div class="form-group col-sm-2 {{ $errors->has('componenteMaterial') ? 'has-error' : '' }}">
                                <label for="nome">Material:</label>
                                <input type="radio" name="componenteMaterial"  value="1" <?php echo 1 == $magia->componenteMaterial ? 'checked' : ''; ?>>Sim
                                <input type="radio" name="componenteMaterial"  value="0" <?php echo 0 == $magia->componenteMaterial ? 'checked' : ''; ?>>Não
                            </div> 
                            <div class="form-group col-sm-2 {{ $errors->has('componenteFoco') ? 'has-error' : '' }}">
                                <label for="nome">Foco:</label>
                                <input type="radio" name="componenteFoco"  value="1" <?php echo 1 == $magia->componenteFoco ? 'checked' : ''; ?>>Sim
                                <input type="radio" name="componenteFoco"  value="0" <?php echo 0 == $magia->componenteFoco ? 'checked' : ''; ?>>Não
                            </div> 
                            <div class="form-group col-sm-2 {{ $errors->has('componenteFocoDivino') ? 'has-error' : '' }}">
                                <label for="nome">Foco D.:</label>
                                <input type="radio" name="componenteFocoDivino"  value="1" <?php echo 1 == $magia->componenteFocoDivino ? 'checked' : ''; ?>>Sim
                                <input type="radio" name="componenteFocoDivino"  value="0" <?php echo 0 == $magia->componenteFocoDivino ? 'checked' : ''; ?>>Não
                            </div> 
                            <div class="form-group col-sm-2 {{ $errors->has('componenteXP') ? 'has-error' : '' }}">
                                <label for="nome">Custo XP:</label>
                                <input type="radio" name="componenteXP" value="1" <?php echo 1 == $magia->componenteXP ? 'checked' : ''; ?>>Sim
                                <input type="radio" name="componenteXP" value="0" <?php echo 0 == $magia->componenteXP ? 'checked' : ''; ?>>Não
                            </div>                            
                        </div> 

                        <div class="form-group {{ $errors->has('componenteDescricao') ? 'has-error' : '' }}">
                            <textarea  name="componenteDescricao" style="max-width:100%" class="form-control" value="{{ $magia->componenteDescricao }}" placeholder="Descrição dos componentes">{{ $magia->componenteDescricao }}</textarea>
                            @if($errors->has('componenteDescricao'))
                            <span class="help-block">
                                <strong>{{ $errors->first('componenteDescricao') }}</strong>								
                            </span>
                            @endif
                        </div> 

                        <div class="form-group {{ $errors->has('tempoExecucao') ? 'has-error' : '' }}">
                            <label for="nome">Tempo de execução:</label>                                                        
                            <div class="input-group">
                                <div class="input-group-btn">
                                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">... <span class="caret"></span></button>
                                    <ul class="dropdown-menu">
                                        <li><a id="t1" onclick="preencheTempoExecucao('1 Ação padrão')">1 Ação padrão</a></li>                                    
                                        <li><a id="t2" onclick="preencheTempoExecucao('1 Rodada completa')">1 Rodada completa</a></li>                                                                            
                                    </ul>
                                </div><!-- /btn-group -->
                                <input id="tempoExecucao" type="text" name="tempoExecucao" class="form-control" value="{{ $magia->tempoExecucao }}" placeholder="Tempo de execução">
                            </div><!-- /input-group -->
                            <script>
                                function preencheTempoExecucao(valor) {
                                    document.getElementById('tempoExecucao').value = valor;
                                }
                            </script>
                            @if($errors->has('tempoExecucao'))
                            <span class="help-block">
                                <strong>{{ $errors->first('tempoExecucao') }}</strong>								
                            </span>
                            @endif
                        </div> 

                        <div class="form-group {{ $errors->has('nivel') ? 'has-error' : '' }}">
                            <label for="nome">Nível:</label>
                            <input type="text" name="nivel" class="form-control" value="{{ $magia->nivel }}" placeholder="Nível da Magia">
                            @if($errors->has('nivel'))
                            <span class="help-block">
                                <strong>{{ $errors->first('nivel') }}</strong>								
                            </span>
                            @endif
                        </div> 

                        <div class="form-group {{ $errors->has('alcance') ? 'has-error' : '' }}">
                            <label for="alcance">Alcance:</label>                                                        
                            <div class="input-group">
                                <div class="input-group-btn">
                                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">... <span class="caret"></span></button>
                                    <ul class="dropdown-menu">
                                        <li><a id="al1" onclick="preencheAlcance('Pessoal')">Pessoal</a></li>                                    
                                        <li><a id="al2" onclick="preencheAlcance('Toque')">Toque</a></li>                                    
                                        <li><a id="al3" onclick="preencheAlcance('Curto(7,5 m + 1,5 m/2 níveis)')">Curto</a></li>                                    
                                        <li><a id="al4" onclick="preencheAlcance('Médio(30 metros + 3 metros/nível)')">Médio</a></li>                                    
                                        <li><a id="al5" onclick="preencheAlcance('Longo(120 m + 12 m/nível)')">Longo</a></li>                                                                            
                                        <li><a id="al6" onclick="preencheAlcance('Ilimitado')">Ilimitado</a></li>                                                                                                                    
                                    </ul>
                                </div><!-- /btn-group -->
                                <input id="alcance" type="text" name="alcance" class="form-control" value="{{ $magia->alcance }}" placeholder="Alcance">
                            </div><!-- /input-group -->
                            <script>
                                function preencheAlcance(valor) {
                                    document.getElementById('alcance').value = valor;
                                }
                            </script>
                            @if($errors->has('alcance'))
                            <span class="help-block">
                                <strong>{{ $errors->first('alcance') }}</strong>								
                            </span>
                            @endif
                        </div> 

                        <div class="row">
                            <div class="form-group col-md-6 {{ $errors->has('alvo') ? 'has-error' : '' }}">
                                <label for="alvo">Alvo:</label>
                                <input type="text" name="alvo" class="form-control" value="{{ $magia->alvo }}" placeholder="Alvo da Magia">
                                @if($errors->has('alvo'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('alvo') }}</strong>								
                                </span>
                                @endif
                            </div> 

                            <div class="form-group col-md-6 {{ $errors->has('area') ? 'has-error' : '' }}">
                                <label for="area">Área:</label>
                                <input type="text" name="area" class="form-control" value="{{ $magia->area }}" placeholder="Área da Magia">
                                @if($errors->has('area'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('area') }}</strong>								
                                </span>
                                @endif
                            </div> 
                        </div>

                        <div class="form-group {{ $errors->has('efeito') ? 'has-error' : '' }}">
                            <label for="area">Efeito:</label>
                            <input type="text" name="efeito" class="form-control" value="{{ $magia->efeito }}" placeholder="Área da Magia">
                            @if($errors->has('efeito'))
                            <span class="help-block">
                                <strong>{{ $errors->first('efeito') }}</strong>								
                            </span>
                            @endif
                        </div> 

                        <div class="row">
                            <div class="form-group col-md-6{{ $errors->has('testeResistencia') ? 'has-error' : '' }}">
                                <label for="testeResistencia">Teste de resistência:</label>                                                        
                                <div class="input-group">
                                    <div class="input-group-btn">
                                        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">... <span class="caret"></span></button>
                                        <ul class="dropdown-menu">
                                            <li><a id="tr1" onclick="preencheTeste('Nenhum')">Nenhum</a></li>                                                                            
                                        </ul>
                                    </div><!-- /btn-group -->
                                    <input id="testeResistencia" type="text" name="testeResistencia" class="form-control" value="{{ $magia->testeResistencia }}" placeholder="Teste de resistência">
                                </div><!-- /input-group -->
                                <script>
                                    function preencheTeste(valor) {
                                        document.getElementById('testeResistencia').value = valor;
                                    }
                                </script>
                                @if($errors->has('testeResistencia'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('testeResistencia') }}</strong>								
                                </span>
                                @endif
                            </div> 

                            <div class="form-group col-md-6{{ $errors->has('resistenciaMagia') ? 'has-error' : '' }}">
                                <label for="resistenciaMagia">Resistência a magia:</label>
                                <input type="text" name="resistenciaMagia" class="form-control" value="{{ $magia->resistenciaMagia }}" placeholder="Resistência a magia">
                                @if($errors->has('efeito'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('resistenciaMagia') }}</strong>								
                                </span>
                                @endif
                            </div> 
                        </div>
                        <div class="form-group {{ $errors->has('duracao') ? 'has-error' : '' }}">
                            <label for="duracao">Duração:</label>
                            <input type="text" name="duracao" class="form-control" value="{{ $magia->duracao }}" placeholder="Duração">
                            @if($errors->has('duracao'))
                            <span class="help-block">
                                <strong>{{ $errors->first('duracao') }}</strong>								
                            </span>
                            @endif
                        </div> 
                        <button class="btn btn-info">Salvar</a>                            
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
