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
                            <input type="text" name="descricao" class="form-control" value="{{ $magia->descricao }}" placeholder="Magia">
                            @if($errors->has('descricao'))
                            <span class="help-block">
                                <strong>{{ $errors->first('descricao') }}</strong>								
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
