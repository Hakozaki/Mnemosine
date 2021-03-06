@extends('layouts.app')

@section('content')

<!--  -->
<script src="/js/jquery-3.1.1.min.js"></script>
<script src="/js/jquery.mask.min.js"></script>
<!-- -->
<script src="/js/bootstrap-select.min.js"></script>
<link href="/css/bootstrap-select.min.css" rel="stylesheet">

<script>
    function preencheTipo(valor) {
        document.getElementById('tipo').value = valor;
    }
</script>

<div class="container">
    <div class="row">
        <div class="col-md-12 ">
            <div class="panel panel-default">             
                <div class="breadcrumb panel-heading">
                    <li><a href="{{ route('talento.index') }}">Talento</a></li>
                    <li class="active">Detalhe</li>
                </div>

                <div class="panel-body">
                    <form action=" {{ route('talento.salvar') }} " method="post">
                        {{ csrf_field() }}
                        <input name="id" type="hidden" value="{{$talento->id}}"/>  

                        <div class="form-group {{ $errors->has('talentoHabilidade') ? 'has-error' : '' }}" >
                            <label for="talentoHabilidade">Tipo Talento:</label>

                            <select name="talentoHabilidade" class="form-control selectpicker" data-live-search="true" value="{{ $talento->talentoHabilidade }}">                                                               
                                @foreach($talento->talentoHabilidades() as $key => $talentoHabilidade)                                                                
                                <option value="{{$key}}"  <?php echo $key == $talento->talentoHabilidade ? 'selected' : ''; ?> class="form-control" data-tokens="{{ $talentoHabilidade }}">{{ $talentoHabilidade }}</option>                                
                                @endforeach
                            </select>

                            @if($errors->has('talentoHabilidade'))
                            <span class="help-block">
                                <strong>{{ $errors->first('talentoHabilidade') }}</strong>								
                            </span>
                            @endif
                        </div>

                        <div class="form-group {{ $errors->has('nome') ? 'has-error' : '' }}">
                            <label for="nome">Nome:</label>
                            <input type="text" name="nome" class="form-control" value="{{ $talento->nome }}" placeholder="Talento">
                            @if($errors->has('nome'))
                            <span class="help-block">
                                <strong>{{ $errors->first('nome') }}</strong>								
                            </span>
                            @endif
                        </div> 

                        <div class="form-group {{ $errors->has('tipo') ? 'has-error' : '' }}">
                            <label for="tipo">Tipo:</label>                                                        
                            <div class="input-group">
                                <div class="input-group-btn">
                                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="caret"></span></button>
                                    <ul class="dropdown-menu">
                                        <li><a id="t1" onclick="preencheTipo('Geral')">Geral</a></li>                                    
                                        <li><a id="t2" onclick="preencheTipo('Metamágico')">Metamágico</a></li>                                                                            
                                    </ul>
                                </div><!-- /btn-group -->
                                <input id="tipo" type="text" name="tipo" class="form-control" value="{{ $talento->tipo }}" placeholder="Tipo">
                            </div><!-- /input-group -->                     
                            @if($errors->has('tipo'))
                            <span class="help-block">
                                <strong>{{ $errors->first('tipo') }}</strong>								
                            </span>
                            @endif
                        </div>                        

                        <div class="form-group {{ $errors->has('descricao') ? 'has-error' : '' }}">
                            <label for="descricao">Descrição:</label>
                            <textarea name="descricao" style="max-width:100%" class="form-control" 
                                      value="{{ $talento->descricao }}" placeholder="Descrição">{{ $talento->descricao }}</textarea>
                            @if($errors->has('descricao'))
                            <span class="help-block">
                                <strong>{{ $errors->first('descricao') }}</strong>								
                            </span>
                            @endif
                        </div> 

                        <div class="form-group {{ $errors->has('observacao') ? 'has-error' : '' }}">
                            <label for="observacao">Observação:</label>
                            <textarea name="observacao" style="max-width:100%" class="form-control" 
                                      value="{{ $talento->observacao }}" placeholder="Observação">{{ $talento->observacao }}</textarea>
                            @if($errors->has('observacao'))
                            <span class="help-block">
                                <strong>{{ $errors->first('observacao') }}</strong>								
                            </span>
                            @endif
                        </div>   

                        <div class="form-group {{ $errors->has('preRequisito') ? 'has-error' : '' }}">
                            <label for="preRequisito">Pré-requisitos:</label>
                            <textarea name="preRequisito" style="max-width:100%" class="form-control" 
                                      value="{{ $talento->preRequisito }}" placeholder="Pré-requisitos">{{ $talento->preRequisito }}</textarea>
                            @if($errors->has('preRequisito'))
                            <span class="help-block">
                                <strong>{{ $errors->first('preRequisito') }}</strong>								
                            </span>
                            @endif
                        </div> 

                        <div class="form-group {{ $errors->has('beneficio') ? 'has-error' : '' }}">
                            <label for="beneficio">Benefício:</label>
                            <textarea name="beneficio" style="max-width:100%" class="form-control" 
                                      value="{{ $talento->beneficio }}" placeholder="Benefício">{{ $talento->beneficio }}</textarea>
                            @if($errors->has('beneficio'))
                            <span class="help-block">
                                <strong>{{ $errors->first('beneficio') }}</strong>								
                            </span>
                            @endif
                        </div>

                        <div class="form-group {{ $errors->has('normal') ? 'has-error' : '' }}">
                            <label for="normal">Normal:</label>
                            <textarea name="normal" style="max-width:100%" class="form-control" 
                                      value="{{ $talento->normal }}" placeholder="Normal">{{ $talento->normal }}</textarea>
                            @if($errors->has('normal'))
                            <span class="help-block">
                                <strong>{{ $errors->first('normal') }}</strong>								
                            </span>
                            @endif
                        </div> 

                        <div class="form-group {{ $errors->has('especial') ? 'has-error' : '' }}">
                            <label for="especial">Especial:</label>
                            <textarea name="especial" style="max-width:100%" class="form-control" 
                                      value="{{ $talento->especial }}" placeholder="Especial">{{ $talento->especial }}</textarea>
                            @if($errors->has('especial'))
                            <span class="help-block">
                                <strong>{{ $errors->first('especial') }}</strong>								
                            </span>
                            @endif
                        </div> 

                        <button class="btn btn-info">Salvar</button>
                        <a class="btn btn-default" href="{{ route('talento.index') }}">Voltar</a>
                    </form>
                </div> <!-- panel-body -->
            </div><!-- panel-default -->
        </div><!-- panel col-md-12 -->
    </div>
</div>
@endsection
