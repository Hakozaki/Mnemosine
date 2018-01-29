@extends('layouts.app')

@section('content')

<!--  -->
<script src="/js/jquery-3.1.1.min.js"></script>
<script src="/js/jquery.mask.min.js"></script>
<!-- -->
<script src="/js/bootstrap-select.min.js"></script>
<link href="/css/bootstrap-select.min.css" rel="stylesheet">

<script>
    jQuery(function ($) {
        $('#peso').mask('##00.00', {reverse: true});
        $('#custo').mask('##00.00', {reverse: true});
        $('.numero').mask('##00', {reverse: true});
    });
</script>

<div class="container">
    <div class="row">
        <div class="col-md-12 ">
            <div class="panel panel-default">             
                <div class="breadcrumb panel-heading">
                    <li><a href="{{ route('armadura.index') }}">Armadura</a></li>
                    <li class="active">Detalhe</li>
                </div>

                <div class="panel-body">
                    <form action=" {{ route('armadura.salvar') }} " method="post">
                        {{ csrf_field() }}
                        <input name="id" type="hidden" value="{{$armadura->id}}"/>                        

                        <div class="form-group {{ $errors->has('nome') ? 'has-error' : '' }}">
                            <label for="nome">Nome:</label>
                            <input type="text" name="nome" class="form-control" value="{{ $armadura->nome }}" placeholder="Nome">
                            @if($errors->has('nome'))
                            <span class="help-block">
                                <strong>{{ $errors->first('nome') }}</strong>								
                            </span>
                            @endif
                        </div>

                        <div class="form-group {{ $errors->has('descricao') ? 'has-error' : '' }}">
                            <label for="descricao">Descrição:</label>
                            <textarea name="descricao" style="max-width:100%" class="form-control" 
                                      value="{{ $armadura->descricao }}" placeholder="Descrição">{{ $armadura->descricao }}</textarea>
                            @if($errors->has('descricao'))
                            <span class="help-block">
                                <strong>{{ $errors->first('descricao') }}</strong>								
                            </span>
                            @endif
                        </div> 

                        <div class="row">
                            <div class="form-group col-md-4{{ $errors->has('categoria') ? 'has-error' : '' }}" >
                                <label for="categoria">Categoria:</label>

                                <select name="categoria" class="form-control selectpicker" data-live-search="true" value="{{ $armadura->categoria }}">                                       
                                    @foreach($armadura->categorias() as $key => $categoria)                                                                
                                    <option value="{{$key}}"  <?php echo $key == $armadura->categoria ? 'selected' : ''; ?> class="form-control" data-tokens="{{ $categoria }}">{{ $categoria }}</option>                                
                                    @endforeach
                                </select>

                                @if($errors->has('categoria'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('categoria') }}</strong>								
                                </span>
                                @endif
                            </div>

                            <div class="form-group col-md-4{{ $errors->has('peso') ? 'has-error' : '' }}">
                                <label for="peso">Peso:</label>
                                <div class="input-group">
                                    <input type="text" id="peso" name="peso" class="form-control" value="{{ $armadura->peso }}" placeholder="Peso">                            
                                    <span class="input-group-addon">KG</span>
                                </div>
                                @if($errors->has('peso'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('peso') }}</strong>								
                                </span>
                                @endif
                            </div>

                            <div class="form-group col-md-4{{ $errors->has('custo') ? 'has-error' : '' }}">
                                <label for="custo">Custo:</label>
                                <div class="input-group">
                                    <input type="text" id="custo" name="custo" class="form-control" value="{{ $armadura->custo }}" placeholder="Custo em Peças de Ouro">                            
                                    <span class="input-group-addon">PO</span>
                                </div>
                                @if($errors->has('custo'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('custo') }}</strong>								
                                </span>
                                @endif
                            </div>
                        </div><!--<div> "row" categoria peso custo -->

                        <div class="row">
                            <div class="form-group col-md-3 {{ $errors->has('bonus') ? 'has-error' : '' }}">
                                <label for="bonus">Bônus:</label>
                                <input type="text" name="bonus" class="form-control numero" value="{{ $armadura->bonus }}" placeholder="Bônus de armadura">                            
                                @if($errors->has('bonus'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('bonus') }}</strong>								
                                </span>
                                @endif
                            </div>

                            <div class="form-group col-md-3{{ $errors->has('bonusDestreza') ? 'has-error' : '' }}">
                                <label for="bonusDestreza">B.Destreza:</label>
                                <input type="text" name="bonusDestreza" class="form-control numero" value="{{ $armadura->bonusDestreza }}" placeholder="Bônus de destreza maxima">                            
                                @if($errors->has('bonusDestreza'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('bonusDestreza') }}</strong>								
                                </span>
                                @endif
                            </div>

                            <div class="form-group col-md-3{{ $errors->has('falhaArmadura') ? 'has-error' : '' }}">
                                <label for="falhaArmadura">Falha de Armadura:</label>                            
                                <div class="input-group">
                                    <span class="input-group-addon">-</span>
                                    <input type="text" name="falhaArmadura" class="form-control numero" value="{{ $armadura->falhaArmadura }}" placeholder="Falha de Armadura">                                                        
                                </div>
                                @if($errors->has('falhaArmadura'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('falhaArmadura') }}</strong>								
                                </span>
                                @endif
                            </div>

                            <div class="form-group col-md-3{{ $errors->has('falhaMagia') ? 'has-error' : '' }}">
                                <label for="falhaMagia">Falha de Magia:</label>
                                <div class="input-group">
                                    <input type="text" name="falhaMagia" class="form-control numero" value="{{ $armadura->falhaMagia }}" placeholder="Falha de Magia">                            
                                    <span class="input-group-addon">%</span>
                                </div>
                                @if($errors->has('falhaMagia'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('falhaMagia') }}</strong>								
                                </span>
                                @endif
                            </div>
                        </div> <!-- <div> "row" bonus ... -->

                        <div class="row">
                            <div class="form-group col-md-6 {{ $errors->has('deslocamento6m') ? 'has-error' : '' }}">
                                <label for="deslocamento6m">Deslocamento 6 M:</label>
                                <div class="input-group">
                                    <input type="text" name="deslocamento6m" class="form-control" value="{{ $armadura->deslocamento6m }}" placeholder="Deslocamento 6 M">                            
                                    <span class="input-group-addon">M</span>
                                </div>
                                @if($errors->has('deslocamento6m'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('deslocamento6m') }}</strong>								
                                </span>
                                @endif
                            </div>

                            <div class="form-group col-md-6 {{ $errors->has('deslocamento9m') ? 'has-error' : '' }}">
                                <label for="deslocamento9m">Deslocamento 9 M:</label>
                                <div class="input-group">
                                    <input type="text" name="deslocamento9m" class="form-control" value="{{ $armadura->deslocamento9m }}" placeholder="Deslocamento 9 M">                            
                                    <span class="input-group-addon">M</span>
                                </div>
                                @if($errors->has('deslocamento9m'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('deslocamento9m') }}</strong>								
                                </span>
                                @endif
                            </div>
                        </div><!-- <div> "row" deslocamento -->

                        <button class="btn btn-info">Salvar</a>                            
                    </form>
                </div> <!-- panel-body -->
            </div><!-- panel-default -->
        </div><!-- panel col-md-12 -->
    </div>
</div>
@endsection
