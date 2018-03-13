@extends('layouts.app')

@section('content')

<script src="/js/arma/adicionaFiltros.js"></script>
<script>
    function pesquisar() {
        document.getElementById('frm').action = "{{ route('arma.pesquisar') }}";
    }

    function imprimir() {
        document.getElementById('frm').action = "{{ route('arma.imprimir') }}";
    }
</script>

<div class="container">
    <div class="row">
        <div class="col-md-12 ">
            <div class="panel panel-default">
                <div class="breadcrumb panel-heading">
                    <li>Arma</li>
                    <li><a href="{{ route('arma.detalhe') }}">Detalhe</a></li>                    
                </div>

                <div class="panel-body">
                    <form method="post" name="frm" id="frm">
                        {{ csrf_field() }}
                        <div class="row" style="margin-bottom: 10px">
                            <div class="col-md-3">
                                <label for="campo">Campo:</label>
                                <select id="campo" name="campo" class="form-control">                                                                               
                                    <option value="id" class="form-control" >Código</option>                                                                        
                                    <option value="nome" class="form-control" >Nome</option>                                                                        
                                    <option value="descricao" class="form-control" >Descrição</option>                                                                        
                                    <option value="categoria" class="form-control" >Categoria</option>                                                                        
                                    <option value="subCategoria" class="form-control" >Subcategoria</option>                                                                        
                                    <option value="tipo" class="form-control" >Tipo</option>                                                                        
                                    <option value="subTipo" class="form-control" >Subtipo</option>                                                                        
                                    <option value="custo" class="form-control" >Custo</option>                                                                        
                                    <option value="dano" class="form-control" >Dano</option>                                                                        
                                    <option value="incrementoDecisivo"  class="form-control" >Incremento Decisivo</option>                                                                        
                                    <option value="distancia" class="form-control" >Distânçia</option>                                                                        
                                    <option value="peso" class="form-control" >Peso</option>                                                                        
                                    <option value="tipoDano" class="form-control" >Tipo Dano</option>                                                                        
                                </select>                                                                    
                            </div><!-- FIM "CAMPO" -->                            

                            <div class="col-md-2">
                                <label for="operador">Operador:</label>                                
                                <select id="operador" name="operador" class="form-control">                                                                               
                                    <option value="="  class="form-control" >=</option>                                                                        
                                    <option value="ilike"  class="form-control" >Contém</option>                                                                        
                                    <option value="<"  class="form-control" ><</option>                                                                        
                                    <option value=">"  class="form-control" >></option>                                                                        
                                </select>                                    
                            </div><!-- FIM "OPERADOR" -->

                            <div class="col-md-7">
                                <label for="filtro">Filtros:</label>                                
                                <div class="input-group">
                                    <input type="text" id="filtro" name="filtro" class="form-control" value="" placeholder="Digite o valor a ser buscado.">                                    
                                    <span class="input-group-btn">                                                                                                                                        
                                        <a class="btn btn-info" onclick="insereFiltro()">Adicionar Filtro</a>
                                        <button class="btn btn-default" onclick="pesquisar()">Pesquisar</button>                                        
                                        <button class="btn btn-default" onclick="imprimir()">Imprimir</button>                                        
                                    </span>
                                </div>
                            </div><!-- FIM "FILTRO" -->                

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
