@extends('layouts.app')

@section('content')
<script>
    function insere() {
        var e = document.getElementById("dominio");
        var campoId = e.options[e.selectedIndex].value;
        var campoValor = e.options[e.selectedIndex].text;
        var className = campoId.replace(" ", "") + campoValor.replace(" ", "");
        className = className.replace(" ", "");

        criaCampoTeste(className);

        var inp = document.createElement("input");
        inp.setAttribute("id", "dominios[" + campoId + "]");
        inp.setAttribute("type", "text");
        inp.setAttribute("name", "dominios[" + campoId + "]");
        inp.setAttribute("class", className);
        inp.setAttribute("value", campoValor);
        inp.setAttribute("hidden", true);


        var pai = document.getElementById("divDominios");
        pai.appendChild(inp);

        insereLinha(campoValor, className);
    }

    function criaCampoTeste(className) {
        if (document.getElementById('teste') === null) {
            var inp = document.createElement("input");
            inp.setAttribute("id", "teste");
            inp.setAttribute("type", "text");
            inp.setAttribute("name", "teste");
            inp.setAttribute("class", className);
            inp.setAttribute("value", "teste");
            inp.setAttribute("hidden", true);

            var pai = document.getElementById("divDominios");
            pai.appendChild(inp);
        }
    }



    function insereLinha(valor, className) {
        var tableRef = document.getElementById('tabelaDominios').getElementsByTagName('tbody')[0];
        // Insert a row in the table at the last row
        var newRow = tableRef.insertRow(tableRef.rows.length);
        newRow.setAttribute("class", className);
        // Insert a cell in the row at index 0
        insereCelula(newRow, 0, "#");
        insereCelula(newRow, 1, valor);
        insereBotao(newRow, 2, className);
    }

    function insereCelula(newRow, coluna, valor) {
        var newCell = newRow.insertCell(coluna);
        var newText = document.createTextNode(valor);
        newCell.appendChild(newText);
    }

    function insereBotao(newRow, coluna, className) {
        var a = document.createElement('a');
        //a.class = "btn btn-danger";
        a.setAttribute("class", "btn btn-info " + className);
        a.setAttribute("onClick", "removeDominio('" + className + "')");
        var linkText = document.createTextNode("Excluir");
        a.appendChild(linkText);


        var newCell = newRow.insertCell(coluna);
        newCell.appendChild(a);
    }

    function removeDominio(dominio) {
        var x = document.getElementsByClassName(dominio);
        var i;
        for (i = 0; i < x.length; i++) {
            console.log(x[i]);
            x[i].remove();
        }

    }


</script> 
<div class="container">
    <div class="row">
        <div class="col-md-12 ">
            <div class="panel panel-default">             
                <div class="breadcrumb panel-heading">
                    <li><a href="{{ route('divindade.index') }}">Divindade</a></li>
                    <li class="active">Detalhe</li>
                </div>

                <div class="panel-body">
                    <form action=" {{ route('divindade.salvar') }} " method="post" id="formPrincipal" name="formPrincipal">
                        {{ csrf_field() }}
                        <input name="id" type="hidden" value="{{$divindade->id}}"/>                        

                        <div class="form-group {{ $errors->has('nome') ? 'has-error' : '' }}">
                            <label for="nome">Nome:</label>
                            <input type="text" name="nome" class="form-control" value="{{ $divindade->nome }}" placeholder="Nome">
                            @if($errors->has('nome'))
                            <span class="help-block">
                                <strong>{{ $errors->first('nome') }}</strong>								
                            </span>
                            @endif
                        </div>
                        <div class="row"> 
                            <div class="form-group col-md-6 {{ $errors->has('tendencia') ? 'has-error' : '' }}" >
                                <label for="tendencia">Tendência:</label>

                                <select name="tendencia" class="form-control selectpicker" data-live-search="true" value="{{ $divindade->tendencia }}">                                   
                                    @foreach($divindade->tendencias() as $key => $tendencia)                                                                
                                    <option value="{{$key}}"  <?php echo $key == $divindade->tendencia ? 'selected' : ''; ?> class="form-control" data-tokens="{{ $tendencia }}">{{ $tendencia }}</option>                                
                                    @endforeach
                                </select>

                                @if($errors->has('tendencia'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('tendencia') }}</strong>								
                                </span>
                                @endif
                            </div>

                            <div class="form-group col-md-6 {{ $errors->has('alinhamento') ? 'has-error' : '' }}" >
                                <label for="alinhamento">Alinhamento:</label>

                                <select name="alinhamento" class="form-control selectpicker" data-live-search="true" value="{{ $divindade->alinhamento }}">                                   
                                    @foreach($divindade->alinhamentos() as $key => $alinhamento)                                                                
                                    <option value="{{$key}}"  <?php echo $key == $divindade->alinhamento ? 'selected' : ''; ?> class="form-control" data-tokens="{{ $alinhamento }}">{{ $alinhamento }}</option>                                
                                    @endforeach
                                </select>

                                @if($errors->has('alinhamento'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('alinhamento') }}</strong>								
                                </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group{{ $errors->has('dominio') ? 'has-error' : '' }}" >
                            <label for="dominio">Dominios:</label>
                            <div class="input-group">
                                <select id="dominio" name="dominio" class="form-control selectpicker" data-live-search="true" value="{{ $divindade->dominio }}">                                   
                                    @foreach($divindade->dominios() as $dominio)                                                                
                                    <option value="{{$dominio->id}}" class="form-control" data-tokens="{{ $dominio->nome }}">{{ $dominio->nome }}</option>                                
                                    @endforeach
                                </select>
                                <span class="input-group-btn"> <a class="btn btn-info" onclick="insere()">Adicionar Dominio</a></span>
                            </div>

                            @if($errors->has('dominio'))
                            <span class="help-block">
                                <strong>{{ $errors->first('dominio') }}</strong>								
                            </span>
                            @endif
                        </div>                                                        

                        <table class="table table-bordered" id="tabelaDominios" name="tabelaDominios">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nome</th>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                   
                                    <th>Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($divindade->divindadeDominios as $_dominio)				
                                <tr>
                                    <th scope="row">{{ $_dominio->id }}</th>
                                    <td>{{ $_dominio->nome }}</td>                                                                                                                                                                                                                                                                                                                                                                                            

                                    <td>                                        
                                        <a class="btn btn-danger" href="javascript:confirm('Deletar dominio?') ? 
                                           window.location.href='{{ route('dominio.deletar',$_dominio) }}' : false ">Excluir</a>
                                    </td>
                                </tr>
                                @endforeach		
                            </tbody>
                        </table>



                        <div class="form-group {{ $errors->has('descricao') ? 'has-error' : '' }}">
                            <label for="descricao">Descrição:</label>
                            <textarea name="descricao" style="max-width:100%" class="form-control" 
                                      value="{{ $divindade->descricao }}" placeholder="Descrição">{{ $divindade->descricao }}</textarea>
                            @if($errors->has('descricao'))
                            <span class="help-block">
                                <strong>{{ $errors->first('descricao') }}</strong>								
                            </span>
                            @endif
                        </div>                       

                        <div class="form-group {{ $errors->has('observacao') ? 'has-error' : '' }}">
                            <label for="observacao">Observação:</label>
                            <textarea name="observacao" style="max-width:100%" class="form-control" 
                                      value="{{ $divindade->observacao }}" placeholder="Descrição">{{ $divindade->observacao }}</textarea>
                            @if($errors->has('observacao'))
                            <span class="help-block">
                                <strong>{{ $errors->first('observacao') }}</strong>								
                            </span>
                            @endif
                        </div>   

                        <div id="divDominios" name="divDominios"></div>

                        <button class="btn btn-info">Salvar</a>                            
                    </form>
                </div> <!-- panel-body -->
            </div><!-- panel-default -->
        </div><!-- panel col-md-12 -->
    </div>
</div>
@endsection
