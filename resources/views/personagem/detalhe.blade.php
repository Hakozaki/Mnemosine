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
                    <li><a href="{{ route('personagem.index') }}">Personagem</a></li>
                    <li class="active">Detalhe</li>
                </div>
                <div class="panel-body">
                    <ul class="nav nav-tabs">
                        <li class="active"><a data-toggle="tab" href="#home">Caracteristicas</a></li>
                        <li><a data-toggle="tab" href="#menu1">Atributos</a></li>
                        <li><a data-toggle="tab" href="#menu2">Testes</a></li>
                        <li><a data-toggle="tab" href="#menu3">Talentos</a></li>
                    </ul><!-- menus -->  
                    <form action=" {{ route('personagem.salvar') }} " method="post">
                        {{ csrf_field() }}
                        <input name="id" type="hidden" value="{{$personagem->id}}"/>                        
                        <input name="jogador_id" type="hidden" value="{{ Auth::user()->id }}"/>    
                        <div class="tab-content">
                            <div id="home" class="tab-pane fade in active">
                                @include('personagem.caracteristicas') 
                            </div><!-- TAB 01 (home) 'CARACTERISTICAS'-->

                            <div id="menu1" class="tab-pane fade">
                                @include('personagem.atributos')                                 
                            </div><!-- TAB 02 (menu1) 'ATRIBUTOS'-->

                            <div id="menu2" class="tab-pane fade">
                                @include('personagem.testes')
                            </div><!-- TAB 03 (menu2) 'TESTES'-->

                            <div id="menu3" class="tab-pane fade">
                                @include('personagem.talentos')
                            </div><!-- TAB 04 (menu3) 'TALENTOS'-->

                            <button class="btn btn-info">Salvar</a>                            

                        </div><!-- tab-content -->
                    </form><!-- FORM -->
                </div> <!-- panel-body -->
            </div><!-- panel-default -->
        </div><!-- panel col-md-12 -->
    </div>
</div>
@endsection
