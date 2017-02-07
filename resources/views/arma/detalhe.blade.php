@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 ">
            <div class="panel panel-default">             
                <div class="breadcrumb panel-heading">
                    <li><a href="{{ route('arma.index') }}">Arma</a></li>
                    <li class="active">Detalhe</li>
                </div>

                <div class="panel-body">
                    <form action=" {{ route('arma.salvar') }} " method="post">
                        {{ csrf_field() }}
                        <input name="id" type="hidden" value="{{$arma->id}}"/>                        

                        <div class="form-group {{ $errors->has('nome') ? 'has-error' : '' }}">
                            <label for="nome">Nome:</label>
                            <input type="text" name="nome" class="form-control" value="{{ $arma->nome }}" placeholder="Talento">
                            @if($errors->has('nome'))
                            <span class="help-block">
                                <strong>{{ $errors->first('nome') }}</strong>								
                            </span>
                            @endif
                        </div>

                        <div class="form-group {{ $errors->has('descricao') ? 'has-error' : '' }}">
                            <label for="descricao">Descrição:</label>
                            <textarea name="descricao" style="max-width:100%" class="form-control" 
                                      value="{{ $arma->descricao }}" placeholder="Descrição">{{ $arma->descricao }}</textarea>
                            @if($errors->has('descricao'))
                            <span class="help-block">
                                <strong>{{ $errors->first('descricao') }}</strong>								
                            </span>
                            @endif
                        </div> 

                        <div class="row">                            
                            <div class="form-group col-md-2 {{ $errors->has('categoria') ? 'has-error' : '' }}" >
                                <label for="categoria">Categoria:</label>

                                <select name="categoria" class="form-control selectpicker" data-live-search="true" value="{{ $arma->categoria }}">   
                                    <option class="form-control" ></option>
                                    @foreach($arma->categorias() as $key => $categoria)                                                                
                                    <option value="{{$key}}"  <?php echo $key == $arma->categoria ? 'selected' : ''; ?> class="form-control" data-tokens="{{ $categoria }}">{{ $categoria }}</option>                                
                                    @endforeach
                                </select>

                                @if($errors->has('categoria'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('categoria') }}</strong>								
                                </span>
                                @endif
                            </div>

                            <div class="form-group col-md-2 {{ $errors->has('subCategoria') ? 'has-error' : '' }}" >
                                <label for="subCategoria">Sub-Categoria:</label>

                                <select name="subCategoria" class="form-control selectpicker" data-live-search="true" value="{{ $arma->subCategoria }}">   
                                    <option class="form-control" ></option>
                                    @foreach($arma->subCategorias() as $key => $subcategoria)                                                                
                                    <option value="{{$key}}"  <?php echo $key == $arma->subCategoria ? 'selected' : ''; ?> class="form-control" data-tokens="{{ $subcategoria }}">{{ $subcategoria }}</option>                                
                                    @endforeach
                                </select>

                                @if($errors->has('subCategoria'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('subCategoria') }}</strong>								
                                </span>
                                @endif
                            </div>

                            <div class="form-group col-md-2 {{ $errors->has('tipo') ? 'has-error' : '' }}" >
                                <label for="tipo">Tipo:</label>

                                <select name="tipo" class="form-control selectpicker" data-live-search="true" value="{{ $arma->tipo }}">   
                                    <option class="form-control" ></option>
                                    @foreach($arma->tipos() as $key => $tipo)                                                                
                                    <option value="{{$key}}"  <?php echo $key == $arma->tipo ? 'selected' : ''; ?> class="form-control" data-tokens="{{ $tipo }}">{{ $tipo }}</option>                                
                                    @endforeach
                                </select>

                                @if($errors->has('tipo'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('tipo') }}</strong>								
                                </span>
                                @endif
                            </div>

                            <div class="form-group col-md-3 {{ $errors->has('subTipo') ? 'has-error' : '' }}" >
                                <label for="subTipo">Sub-Tipo:</label>

                                <select name="subTipo" class="form-control selectpicker" data-live-search="true" value="{{ $arma->subTipo }}">   
                                    <option class="form-control" ></option>
                                    @foreach($arma->subTipos() as $key => $subTipo)                                                                
                                    <option value="{{$key}}"  <?php echo $key == $arma->subTipo ? 'selected' : ''; ?> class="form-control" data-tokens="{{ $subTipo }}">{{ $subTipo }}</option>                                
                                    @endforeach
                                </select>

                                @if($errors->has('subTipo'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('subTipo') }}</strong>								
                                </span>
                                @endif
                            </div>

                            <div class="form-group col-md-3 {{ $errors->has('tipoDano') ? 'has-error' : '' }}" >
                                <label for="tipoDano">Tipo de dano:</label>

                                <select name="tipoDano" class="form-control selectpicker" data-live-search="true" value="{{ $arma->tipoDano }}">   
                                    <option class="form-control" ></option>
                                    @foreach($arma->tipoDanos() as $key => $tipoDano)                                                                
                                    <option value="{{$key}}"  <?php echo $key == $arma->tipoDano ? 'selected' : ''; ?> class="form-control" data-tokens="{{ $tipoDano }}">{{ $tipoDano }}</option>                                
                                    @endforeach
                                </select>

                                @if($errors->has('tipoDano'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('tipoDano') }}</strong>								
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-md-6 {{ $errors->has('peso') ? 'has-error' : '' }}">
                                <label for="peso">Peso:</label>
                                <div class="input-group">
                                    <input type="text" name="peso" class="form-control" value="{{ $arma->peso }}" placeholder="Peso da arma">                            
                                    <span class="input-group-addon">KG</span>
                                </div>
                                @if($errors->has('peso'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('peso') }}</strong>								
                                </span>
                                @endif
                            </div>

                            <div class="form-group col-md-6 {{ $errors->has('custo') ? 'has-error' : '' }}">
                                <label for="custo">Custo:</label>
                                <div class="input-group">
                                    <input type="text" name="custo" class="form-control" value="{{ $arma->custo }}" placeholder="Custo em Peças de Cobre">                            
                                    <span class="input-group-addon">PC</span>
                                </div>
                                <script>
                                    function preencheCusto(valor) {
                                        document.getElementById('custo').value = valor;
                                    }
                                </script>
                                @if($errors->has('custo'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('custo') }}</strong>								
                                </span>
                                @endif
                            </div>

                        </div>

                        <div class="row">
                            <div class="form-group col-md-6 {{ $errors->has('dano') ? 'has-error' : '' }}">
                                <label for="dano">Dano(M):</label>                                                        
                                <div class="input-group">
                                    <div class="input-group-btn">
                                        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="caret"></span></button>
                                        <ul class="dropdown-menu">
                                            <li><a id="d1" onclick="preencheDano('1D4')">1D4</a></li>                                                                            
                                            <li><a id="d2" onclick="preencheDano('1D6')">1D6</a></li>                                                                            
                                            <li><a id="d3" onclick="preencheDano('1D8')">1D8</a></li>                                                                            
                                            <li><a id="d4" onclick="preencheDano('1D10')">1D10</a></li>                                                                            
                                            <li><a id="d5" onclick="preencheDano('1D12')">1D12</a></li>                                                                                                                    
                                        </ul>
                                    </div><!-- /btn-group -->
                                    <input id="dano" type="text" name="dano" class="form-control" value="{{ $arma->dano }}" placeholder="Tempo de execução">
                                </div><!-- /input-group -->
                                <script>
                                    function preencheDano(valor) {
                                        document.getElementById('dano').value = valor;
                                    }
                                </script>
                                @if($errors->has('dano'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('dano') }}</strong>								
                                </span>
                                @endif
                            </div>

                            <div class="form-group col-md-6 {{ $errors->has('incrementoDecisivo') ? 'has-error' : '' }}">
                                <label for="incrementoDecisivo">Incremento Decisivo:</label>                                                        
                                <div class="input-group">
                                    <div class="input-group-btn">
                                        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="caret"></span></button>
                                        <ul class="dropdown-menu">
                                            <li><a id="ds1" onclick="preencheDecisivo('X2')">X2</a></li>                                                                                                                                                                                                                                                                                       
                                            <li><a id="ds2" onclick="preencheDecisivo('X3')">X3</a></li>                                                                                                                                                                                                                                                                                       
                                            <li><a id="ds3" onclick="preencheDecisivo('X4')">X4</a></li>                                                                                                                                                                                                                                                                                       
                                            <li><a id="ds4" onclick="preencheDecisivo('19-20/X2')">19-20/X2</a></li>                                                                                                                                                                                                                                                                                       
                                            <li><a id="ds5" onclick="preencheDecisivo('18-20/X2')">18-20/X2</a></li>                                                                                                                                                                                                                                                                                       
                                        </ul>
                                    </div><!-- /btn-group -->
                                    <input id="incrementoDecisivo" type="text" name="incrementoDecisivo" class="form-control" value="{{ $arma->incrementoDecisivo }}" placeholder="Decisivo">
                                </div><!-- /input-group -->
                                <script>
                                    function preencheDecisivo(valor) {
                                        document.getElementById('incrementoDecisivo').value = valor;
                                    }
                                </script>
                                @if($errors->has('incrementoDecisivo'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('incrementoDecisivo') }}</strong>								
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
