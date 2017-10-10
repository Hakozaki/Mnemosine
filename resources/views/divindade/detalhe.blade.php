@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 ">
            <div class="panel panel-default">             
                <div class="breadcrumb panel-heading">
                    <li><a href="{{ route('divindade.index') }}">Divindade</a></li>
                    <li class="active">Detalhe</li>
                </div>

                <div class="panel-body">
                    <form action=" {{ route('divindade.salvar') }} " method="post">
                        {{ csrf_field() }}
                        <input name="id" type="hidden" value="{{$divindade->id}}"/>                        

                        <div class="form-group {{ $errors->has('nome') ? 'has-error' : '' }}">
                            <label for="nome">Nome:</label>
                            <input type="text" name="nome" class="form-control" value="{{ $divindade->nome }}" placeholder="Nome">
                            @if($errors->has('nome'))
                            <span class="help-block">
                                <strong>{{ $errors->first('nome') }}</strong>								
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

                        <button class="btn btn-info">Salvar</a>                            
                    </form>
                </div> <!-- panel-body -->
            </div><!-- panel-default -->
        </div><!-- panel col-md-12 -->
    </div>
</div>
@endsection
