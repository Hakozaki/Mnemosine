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
                            <textarea type="text" name="descricao" class="form-control" value="{{ $magia->descricao }}" placeholder="Descrição da Magia"></textarea>
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
                                <input type="checkbox" name="componenteVisual"  value="{{ $magia->componenteVisual }}">
                            </div> 
                            <div class="form-group col-sm-2 {{ $errors->has('componenteGestual') ? 'has-error' : '' }}">
                                <label for="nome">Gestual:</label>
                                <input type="checkbox" name="componenteGestual"  value="{{ $magia->componenteGestual }}">
                            </div> 
                            <div class="form-group col-sm-2 {{ $errors->has('componenteMaterial') ? 'has-error' : '' }}">
                                <label for="nome">Material:</label>
                                <input type="checkbox" name="componenteMaterial"  value="{{ $magia->componenteMaterial }}">
                            </div> 
                            <div class="form-group col-sm-2 {{ $errors->has('componenteFoco') ? 'has-error' : '' }}">
                                <label for="nome">Foco:</label>
                                <input type="checkbox" name="componenteFoco"  value="{{ $magia->componenteFoco }}">
                            </div> 
                            <div class="form-group col-sm-2 {{ $errors->has('componenteFocoDivino') ? 'has-error' : '' }}">
                                <label for="nome">Foco Divino:</label>
                                <input type="checkbox" name="componenteFocoDivino"  value="{{ $magia->componenteFocoDivino }}">
                            </div> 
                            <div class="form-group col-sm-2 {{ $errors->has('componenteXP') ? 'has-error' : '' }}">
                                <label for="nome">Custo de XP:</label>
                                <input type="checkbox" name="componenteXP"  value="{{ $magia->componenteXP }}">
                            </div> 
                        </div> 
                        <div class="form-group {{ $errors->has('componenteDescricao') ? 'has-error' : '' }}">

                            <textarea  name="componenteDescricao" class="form-control" value="{{ $magia->componenteDescricao }}" placeholder="Descrição dos componentes"></textarea>
                            @if($errors->has('nome'))
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
                                        <li id="t1" onclick="document.getElementById('tempoExecucao').innerHTML = 'TESTE'"><a>1 Ação padrão</a></li>                                    
                                        <li><a>1 Rodada completa</a></li>                                    
                                    </ul>
                                </div><!-- /btn-group -->
                                <input id="tempoExecucao" type="text" name="tempoExecucao" class="form-control" value="{{ $magia->tempoExecucao }}" placeholder="Tempo de execução">
                            </div><!-- /input-group -->

                            @if($errors->has('tempoExecucao'))
                            <span class="help-block">
                                <strong>{{ $errors->first('tempoExecucao') }}</strong>								
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
