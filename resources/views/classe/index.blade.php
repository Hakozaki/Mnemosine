@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 ">
            <div class="panel panel-default">
                <div class="breadcrumb panel-heading">
                    <li>Classe</li>
                    <li><a href="{{ route('classe.detalhe') }}">Detalhe</a></li>                    
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
                            @foreach($classes as $classe)				
                            <tr>
                                <th scope="row">{{ $classe->id }}</th>
                                <td>{{ $classe->nome }}</td>                                                                                                                                                                                                                                                                                                                                                                                            
                                <td>
                                    <a class="btn btn-default" href="{{ route('classe.detalhe',$classe) }}">Editar</a>
                                    <a class="btn btn-danger" href="javascript:confirm('Deletar talento?') ? 
                                       window.location.href='{{ route('classe.deletar',$classe) }}' : false ">Excluir</a>
                                </td>
                            </tr>
                            @endforeach		
                        </tbody>
                    </table>
                    <div align="center">
                        {!! $classes->links(); !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
