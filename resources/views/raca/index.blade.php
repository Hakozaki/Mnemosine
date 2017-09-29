@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 ">
            <div class="panel panel-default">
                <div class="breadcrumb panel-heading">
                    <li>Raça</li>
                    <li><a href="{{ route('raca.detalhe') }}">Detalhe</a></li>                    
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
                            @foreach($racas as $raca)				
                            <tr>
                                <th scope="row">{{ $raca->id }}</th>
                                <td>{{ $raca->nome }}</td>                                                                                                                                                                                                                                                                                                                                                                                            
                                <td>
                                    <a class="btn btn-default" href="{{ route('raca.detalhe',$raca) }}">Editar</a>
                                    <a class="btn btn-danger" href="javascript:confirm('Deletar Raça?') ? 
                                       window.location.href='{{ route('raca.deletar',$raca) }}' : false ">Excluir</a>
                                </td>
                            </tr>
                            @endforeach		
                        </tbody>
                    </table>
                    <div align="center">
                        {!! $racas->links(); !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
