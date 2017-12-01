@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 ">
            <div class="panel panel-default">
                <div class="breadcrumb panel-heading">
                    <li>Domínio</li>
                    <li><a href="{{ route('dominio.detalhe') }}">Detalhe</a></li>                    
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
                            @foreach($dominios as $dominio)				
                            <tr>
                                <th scope="row">{{ $dominio->id }}</th>
                                <td>{{ $dominio->nome }}</td>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                     
                                <td>
                                    <a class="btn btn-default" href="{{ route('dominio.detalhe',$dominio) }}">Editar</a>
                                    <a class="btn btn-danger" href="javascript:confirm('Deletar dominio?') ? 
                                       window.location.href='{{ route('dominio.deletar',$dominio) }}' : false ">Excluir</a>
                                </td>
                            </tr>
                            @endforeach		
                        </tbody>
                    </table>
                    <div align="center">
                        {!! $dominios->links(); !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
