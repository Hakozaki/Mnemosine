@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 ">
            <div class="panel panel-default">
                <div class="breadcrumb panel-heading">
                    <li>Magia</li>
                    <li><a href="{{ route('magia.detalhe') }}">Detalhe</a></li>                    
                </div>

                <div class="panel-body">
                    
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nome</th>                                                              
                                <th>Ações</th>                                                              
                                <th>Escola</th>                                                              
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($magias as $magia)				
                            <tr>
                                <th scope="row">{{ $magia->id }}</th>
                                <td>{{ $magia->nome }}</td>                                                               
                                <td>{{ $magia->_escola($magia->escola) . " (". $magia->_subEscola($magia->subEscola) .") " . "[". $magia->_descritor($magia->descritor) ."]" }}</td>                                                               
                                <td>
                                    <a class="btn btn-default" href="{{ route('magia.detalhe',$magia) }}">Editar</a>
                                    <a class="btn btn-danger" href="javascript:confirm('Deletar magia?') ? 
                                       window.location.href='{{ route('magia.deletar',$magia) }}' : false ">Excluir</a>
                                </td>
                            </tr>
                            @endforeach		
                        </tbody>
                    </table>
                    <div align="center">
                        {!! $magias->links(); !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
