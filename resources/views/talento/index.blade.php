@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 ">
            <div class="panel panel-default">
                <div class="breadcrumb panel-heading">
                    <li>Talento</li>
                    <li><a href="{{ route('talento.detalhe') }}">Detalhe</a></li>                    
                </div>

                <div class="panel-body">
                    
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Categoria</th>                                                                                                                                                                                                                                                          
                                <th>Nome</th>                                                                                                                                                                                                                                                          
                                <th>Tipo</th>                                                                                                                                                                                                                                                          
                                <th>Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($talentos as $talento)				
                            <tr>
                                <th scope="row">{{ $talento->id }}</th>
                                <td>{{ $talento->_talentoHabilidades($talento->talentoHabilidade) }}</td>                                                                                                                              
                                <td>{{ $talento->nome }}</td>                                                                                                                              
                                <td>{{ $talento->tipo }}</td>                                                                                                                              
                                <td>
                                    <a class="btn btn-default" href="{{ route('talento.detalhe',$talento) }}">Editar</a>
                                    <a class="btn btn-danger" href="javascript:confirm('Deletar talento?') ? 
                                       window.location.href='{{ route('talento.deletar',$talento) }}' : false ">Excluir</a>
                                </td>
                            </tr>
                            @endforeach		
                        </tbody>
                    </table>
                    <div align="center">
                        {!! $talentos->links(); !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
