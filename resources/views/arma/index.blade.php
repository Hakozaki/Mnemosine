@extends('layouts.app')

@section('content')

<script src="/js/arma/adicionaFiltros.js"></script>

<div class="container">
    <div class="row">
        <div class="col-md-12 ">
            <div class="panel panel-default">
                <div class="breadcrumb panel-heading">
                    <li>Arma</li>
                    <li><a href="{{ route('arma.detalhe') }}">Detalhe</a></li>                    
                </div>

                <div class="panel-body">
                    <form action="{{ route('arma.pesquisar') }}" method="post">
                        {{ csrf_field() }}
                        <div class="row" style="margin-bottom: 10px">
                            <div class="col-md-5">
                                <label for="filtro">Filtros:</label>                                
                                <input type="text" id="filtro" name="filtro" class="form-control" value="" placeholder="Digite o valor a ser buscado.">                                    
                            </div><!-- FIM "FILTRO" -->                

                            <div class="col-md-2">
                                <label for="operador">Operador:</label>                                
                                <select id="operador" name="operador" class="form-control">                                                                               
                                    <option value="="  class="form-control" >=</option>                                                                        
                                    <option value="<"  class="form-control" ><</option>                                                                        
                                    <option value=">"  class="form-control" >></option>                                                                        
                                </select>                                    
                            </div><!-- FIM "OPERADOR" -->

                            <div class="col-md-5">
                                <label for="campo">Campo:</label>
                                <div class="input-group">
                                    <select id="campo" name="campo" class="form-control">                                                                               
                                        <option value="id"  class="form-control" >Código</option>                                                                        
                                        <option value="nome"  class="form-control" >Nome</option>                                                                        
                                        <option value="categoria"  class="form-control" >Categoria</option>                                                                        
                                    </select>
                                    <span class="input-group-btn">                                                                                                                                        
                                        <a class="btn btn-info" onclick="insereFiltro()">Adicionar Filtro</a>
                                        <button class="btn btn-default">Pesquisar</button>
                                    </span>
                                </div>
                            </div><!-- FIM "CAMPO" -->

                            <div id="divCamposFiltro">

                            </div><!-- -->
                            
                            <div id="divCamposFiltroM" class="col-md-12" style="margin-top: 10px">

                            </div><!-- -->
                        </div>
                    </form><!-- FIM FORM -->

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
