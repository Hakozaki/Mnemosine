@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 ">
            <div class="panel panel-default">
                <div class="breadcrumb panel-heading">
                    <li>Arma</li>
                    <li><a href="{{ route('arma.detalhe') }}">Detalhe</a></li>                    
                </div>

                <div class="panel-body">
                    
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nome</th>                                                                                                                                                                                                                                                                                                                                                                                                         
                                <th>Categoria</th>                                                                                                                                                                                                                                                                                                                                                                                                         
                                <th>Sub-Categoria</th>                                                                                                                                                                                                                                                                                                                                                                                                         
                                <th>Tipo</th>                                                                                                                                                                                                                                                                                                                                                                                                                                         
                                <th>Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($armas as $arma)				
                            <tr>
                                <th scope="row">{{ $arma->id }}</th>
                                <td>{{ $arma->nome }}</td>                                                                                                                                                              
                                <td>{{ $arma->_categoria($arma->categoria) }}</td>                                                                                                                                                              
                                <td>{{ $arma->_subCategoria($arma->subCategoria) }}</td>                                                                                                                                                              
                                <td>{{ $arma->_tipo($arma->tipo) }}</td>                                                                                                                                                              
                                <td>
                                    <a class="btn btn-default" href="{{ route('arma.detalhe',$arma) }}">Editar</a>
                                    <a class="btn btn-danger" href="javascript:confirm('Deletar talento?') ? 
                                       window.location.href='{{ route('arma.deletar',$arma) }}' : false ">Excluir</a>
                                </td>
                            </tr>
                            @endforeach		
                        </tbody>
                    </table>
                    <div align="center">
                        {!! $armas->links(); !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
