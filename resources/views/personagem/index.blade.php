@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 ">
            <div class="panel panel-default">
                <div class="breadcrumb panel-heading">
                    <li>Personagem</li>
                    <li><a href="{{ route('personagem.detalhe') }}">Detalhe</a></li>                    
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
                            @foreach($personagens as $personagem)				
                            <tr>
                                <th scope="row">{{ $personagem->id }}</th>
                                <td>{{ $personagem->nome }}</td>                                                                                                                                                                                                                                                                                                                                                                                            
                                <td>
                                    <a class="btn btn-default" href="{{ route('personagem.detalhe',$personagem) }}">Editar</a>
                                    <a class="btn btn-danger" href="javascript:confirm('Deletar Personagem?') ? 
                                       window.location.href='{{ route('personagem.deletar',$personagem) }}' : false ">Excluir</a>
                                </td>
                            </tr>
                            @endforeach		
                        </tbody>
                    </table>
                    <div align="center">
                        {!! $personagens->links(); !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
