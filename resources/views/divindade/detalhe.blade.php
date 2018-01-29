@extends('layouts.app')

@section('content')
<!-- -->
<script src="/js/jquery-3.1.1.min.js"></script>
<script src="/js/jquery.mask.min.js"></script>

<script src="/js/divindade/adicionaDominios.js"></script>
<!-- -->
<script src="/js/bootstrap-select.min.js"></script>
<link href="/css/bootstrap-select.min.css" rel="stylesheet">

<div class="container">
    <div class="row">
        <div class="col-md-12 ">
            <div class="panel panel-default">             
                <div class="breadcrumb panel-heading">
                    <li><a href="{{ route('divindade.index') }}">Divindade</a></li>
                    <li class="active">Detalhe</li>
                </div>

                <div class="panel-body">
                    <form action=" {{ route('divindade.salvar') }} " method="post" id="formPrincipal" name="formPrincipal">
                        {{ csrf_field() }}
                        <input name="id" type="hidden" value="{{$divindade->id}}"/>                        
                        <div class="row">
                            <div class="form-group col-md-6{{ $errors->has('nome') ? 'has-error' : '' }}">
                                <label for="nome">Nome:</label>
                                <input type="text" name="nome" class="form-control" value="{{ $divindade->nome }}" placeholder="Nome">
                                @if($errors->has('nome'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('nome') }}</strong>								
                                </span>
                                @endif
                            </div>
                            <div class="form-group col-md-6{{ $errors->has('panteao') ? 'has-error' : '' }}">
                                <label for="panteao">Panteão:</label>
                                <input type="text" name="panteao" class="form-control" value="{{ $divindade->panteao }}" placeholder="Panteão">
                                @if($errors->has('panteao'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('panteao') }}</strong>								
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group {{ $errors->has('aspectos') ? 'has-error' : '' }}">
                            <label for="aspectos">Aspectos:</label>
                            <input type="text" name="aspectos" class="form-control" value="{{ $divindade->aspectos }}" placeholder="Aspectos">
                            @if($errors->has('aspectos'))
                            <span class="help-block">
                                <strong>{{ $errors->first('aspectos') }}</strong>								
                            </span>
                            @endif
                        </div>

                        <div class="row"> 
                            <div class="form-group col-md-6 {{ $errors->has('tendencia') ? 'has-error' : '' }}" >
                                <label for="tendencia">Tendência:</label>

                                <select name="tendencia" class="form-control selectpicker" data-live-search="true" value="{{ $divindade->tendencia }}">                                   
                                    @foreach($divindade->tendencias() as $key => $tendencia)                                                                
                                    <option value="{{$key}}"  <?php echo $key == $divindade->tendencia ? 'selected' : ''; ?> class="form-control" data-tokens="{{ $tendencia }}">{{ $tendencia }}</option>                                
                                    @endforeach
                                </select>

                                @if($errors->has('tendencia'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('tendencia') }}</strong>								
                                </span>
                                @endif
                            </div>

                            <div class="form-group col-md-6 {{ $errors->has('alinhamento') ? 'has-error' : '' }}" >
                                <label for="alinhamento">Alinhamento:</label>

                                <select name="alinhamento" class="form-control selectpicker" data-live-search="true" value="{{ $divindade->alinhamento }}">                                   
                                    @foreach($divindade->alinhamentos() as $key => $alinhamento)                                                                
                                    <option value="{{$key}}"  <?php echo $key == $divindade->alinhamento ? 'selected' : ''; ?> class="form-control" data-tokens="{{ $alinhamento }}">{{ $alinhamento }}</option>                                
                                    @endforeach
                                </select>

                                @if($errors->has('alinhamento'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('alinhamento') }}</strong>								
                                </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group{{ $errors->has('dominio') ? 'has-error' : '' }}" >
                            <label for="dominio">Dominios:</label>
                            <div class="input-group">
                                <select id="dominio" name="dominio" class="form-control selectpicker" data-live-search="true" value="{{ $divindade->dominio }}">                                   
                                    @foreach($divindade->dominios() as $dominio)                                                                
                                    <option value="{{$dominio->id}}" class="form-control" data-tokens="{{ $dominio->nome }}">{{ $dominio->nome }}</option>                                
                                    @endforeach
                                </select>
                                <span class="input-group-btn"> <a class="btn btn-info" onclick="insereDominio()">Adicionar Dominio</a></span>
                            </div>

                            @if($errors->has('dominio'))
                            <span class="help-block">
                                <strong>{{ $errors->first('dominio') }}</strong>								
                            </span>
                            @endif
                        </div>                                                        

                        <table class="table table-bordered" id="tabelaDominios" name="tabelaDominios">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nome</th>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                   
                                    <th>Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($divindade->divindadeDominios as $_dominio)				
                                <tr>
                                    <th scope="row">{{ $_dominio->id }}</th>
                                    <td>{{ $_dominio->nome }}</td>                                                                                                                                                                                                                                                                                                                                                                                            

                                    <td>                                        
                                        <a class="btn btn-danger" href="javascript:confirm('Deletar dominio?') ? 
                                           window.location.href='{{ route('dominio.deletar',$_dominio) }}' : false ">Excluir</a>
                                    </td>
                                </tr>
                                @endforeach		
                            </tbody>
                        </table>

                        <div class="form-group {{ $errors->has('descricao') ? 'has-error' : '' }}">
                            <label for="descricao">Descrição:</label>
                            <textarea name="descricao" style="max-width:100%" class="form-control" 
                                      value="{{ $divindade->descricao }}" placeholder="Descrição">{{ $divindade->descricao }}</textarea>
                            @if($errors->has('descricao'))
                            <span class="help-block">
                                <strong>{{ $errors->first('descricao') }}</strong>								
                            </span>
                            @endif
                        </div>  

                        <div class="form-group {{ $errors->has('dogma') ? 'has-error' : '' }}">
                            <label for="dogma">Dogma:</label>
                            <textarea name="dogma" style="max-width:100%" class="form-control" 
                                      value="{{ $divindade->dogma }}" placeholder="Aspectos">{{ $divindade->Dogma }}</textarea>
                            @if($errors->has('dogma'))
                            <span class="help-block">
                                <strong>{{ $errors->first('dogma') }}</strong>								
                            </span>
                            @endif
                        </div>                       

                        <div class="form-group {{ $errors->has('observacao') ? 'has-error' : '' }}">
                            <label for="observacao">Observação:</label>
                            <textarea name="observacao" style="max-width:100%" class="form-control" 
                                      value="{{ $divindade->observacao }}" placeholder="Descrição">{{ $divindade->observacao }}</textarea>
                            @if($errors->has('observacao'))
                            <span class="help-block">
                                <strong>{{ $errors->first('observacao') }}</strong>								
                            </span>
                            @endif
                        </div>   

                        <div id="divDominios" name="divDominios"></div>

                        <button class="btn btn-info">Salvar</button>                            
                        <a class="btn btn-default" href="{{ route('divindade.index') }}">Voltar</a>
                    </form>
                </div> <!-- panel-body -->
            </div><!-- panel-default -->
        </div><!-- panel col-md-12 -->
    </div>
</div>
@endsection
