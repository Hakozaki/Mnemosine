@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 ">
            <div class="panel panel-default">
                <div class="breadcrumb panel-heading">
                    <li>Armadura</li>
                    <li><a href="{{ route('armadura.detalhe') }}">Detalhe</a></li>                    
                </div>

                <div class="panel-body">
                    
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nome</th>                                                                                                                                                                                                                                                                                                                                                                                                         
                                <th>Categoria</th>                                                                                                                                                                                                                                                                                                                                                                                                                                         
                                <th>Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($armaduras as $armadura)				
                            <tr>
                                <th scope="row">{{ $armadura->id }}</th>
                                <td>{{ $armadura->nome }}</td>                                                                                                                                                              
                                <td>{{ $armadura->_categoria($armadura->categoria) }}</td>                                                                                                                                                                                              
                                <td>
                                    <a class="btn btn-default" href="{{ route('armadura.detalhe',$armadura) }}">Editar</a>
                                    <a class="btn btn-danger" href="javascript:confirm('Deletar talento?') ? 
                                       window.location.href='{{ route('armadura.deletar',$armadura) }}' : false ">Excluir</a>
                                </td>
                            </tr>
                            @endforeach		
                        </tbody>
                    </table>
                    <div align="center">
                        {!! $armaduras->links(); !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
