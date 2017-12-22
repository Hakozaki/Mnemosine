function insereHabilidadeEspecial() {
    var e = document.getElementById("habEspecial");

    var campoId = e.options[e.selectedIndex].value;
    var campoValor = e.options[e.selectedIndex].text;

    var className = campoId.replace(" ", "") + campoValor.replace(" ", "");
    className = className.replace(" ", "");

    criaCampoTesteHabilidadeEspecial(className);

    var inp = document.createElement("input");
    inp.setAttribute("id", "talentos[" + campoId + "]");
    inp.setAttribute("type", "text");
    inp.setAttribute("name", "talentos[" + campoId + "]");
    inp.setAttribute("class", className);
    inp.setAttribute("value", campoValor);
    inp.setAttribute("hidden", true);


    var pai = document.getElementById("divHabilidadesEspeciais");
    pai.appendChild(inp);

    insereLinhaHabilidadeEspecial(campoValor, className);
}

function criaCampoTesteHabilidadeEspecial(className) {
    if (document.getElementById('teste') === null) {
        var inp = document.createElement("input");
        inp.setAttribute("id", "teste");
        inp.setAttribute("type", "text");
        inp.setAttribute("name", "teste");
        inp.setAttribute("class", className);
        inp.setAttribute("value", "teste");
        inp.setAttribute("hidden", true);

        var pai = document.getElementById("divHabilidadesEspeciais");
        pai.appendChild(inp);
    }
}

function insereLinhaHabilidadeEspecial(valor, className) {
    var tableRef = document.getElementById('tabelaHabEspeciais').getElementsByTagName('tbody')[0];
    // Insert a row in the table at the last row
    var newRow = tableRef.insertRow(tableRef.rows.length);
    newRow.setAttribute("class", className);
    // Insert a cell in the row at index 0
    insereCelulaHabilidadeEspecial(newRow, 0, "#");
    insereCelulaHabilidadeEspecial(newRow, 1, valor);
    insereBotaoHabilidadeEspecial(newRow, 2, className);
}

function insereCelulaHabilidadeEspecial(newRow, coluna, valor) {
    var newCell = newRow.insertCell(coluna);
    var newText = document.createTextNode(valor);
    newCell.appendChild(newText);
}

function insereBotaoHabilidadeEspecial(newRow, coluna, className) {
    var a = document.createElement('a');
    //a.class = "btn btn-danger";
    a.setAttribute("class", "btn btn-info " + className);
    a.setAttribute("onClick", "removeHabilidadeEspecial('" + className + "')");
    var linkText = document.createTextNode("Excluir");
    a.appendChild(linkText);


    var newCell = newRow.insertCell(coluna);
    newCell.appendChild(a);
}

function removeHabilidadeEspecial(habilidadeEspecial) {
    jQuery(function ($) {
        $("input").remove("." + habilidadeEspecial);
        $("tr").remove("." + habilidadeEspecial);
        $("a").remove("." + habilidadeEspecial);
    });
}