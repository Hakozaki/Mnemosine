@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 ">
            <div class="panel panel-default">
                <div class="breadcrumb panel-heading">
                    <li>Divindade</li>
                    <li><a href="{{ route('divindade.detalhe') }}">Detalhe</a></li>                    
                </div>

                <div class="panel-body">
                    
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nome</th>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                               
                                <th>Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($divindades as $divindade)				
                            <tr>
                                <th scope="row">{{ $divindade->id }}</th>
                                <td>{{ $divindade->nome }}</td>                                                                                                                                                                                                                                                                                                                                                                                            
                                <td>
                                    <a class="btn btn-default" href="{{ route('divindade.detalhe',$divindade) }}">Editar</a>
                                    <a class="btn btn-danger" href="javascript:confirm('Deletar talento?') ? 
                                       window.location.href='{{ route('divindade.deletar',$divindade) }}' : false ">Excluir</a>
                                </td>
                            </tr>
                            @endforeach		
                        </tbody>
                    </table>
                    <div align="center">
                        {!! $divindades->links(); !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
