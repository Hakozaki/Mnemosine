@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 ">
            <div class="panel panel-default">
                <div class="breadcrumb panel-heading">
                    <li>Classe</li>
                    <li><a href="{{ route('batalha.detalhe') }}">Detalhe</a></li>                    
                </div>

                <div class="panel-body">
                    <a href="{{ route("batalha.criaPartida") }}" class="btn btn-default" style="margin-bottom: 10px"> Criar nova partida </a>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Data</th>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                               
                                <th>Rodada</th>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                               
                                <th>Turno</th>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                               
                                <th>Ação</th>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                               
                                <th>Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($batalhas as $batalha)				
                            <tr>

                                <th scope="row">{{ $batalha->id }}</th>
                                <td>{{ date('d/m/Y h:m:s', strtotime($batalha->data)) }}</td>                                                                                                                                                                                                                                                                                                                                                                                            
                                <td>{{ $batalha->rodada }}</td>                                                                                                                                                                                                                                                                                                                                                                                                                            
                                <td>{{ $batalha->turno }}</td>                                                                                                                                                                                                                                                                                                                                                                                                                            
                                <td>{{ $batalha->acao }}</td>                                                                                                                                                                                                                                                                                                                                                                                                                            
                                <td>
                                    <a class="btn btn-default" href="{{ route('acompanhaBatalha.detalhe',$batalha) }}">Visualizar</a>                                   
                                </td>
                            </tr>
                            @endforeach		
                        </tbody>
                    </table>
                    <div align="center">
                        {!! $batalhas->links(); !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
