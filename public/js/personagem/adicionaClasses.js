function insereClasse() {
    var e = document.getElementById("classe");
    var en = document.getElementById("classeNivel");

    var campoId = e.options[e.selectedIndex].value;
    var campoValor = e.options[e.selectedIndex].text;

    var campoNivelValor = en.value;

    var className = campoId.replace(" ", "") + campoValor.replace(" ", "");
    className = className.replace(" ", "");

    criaCampoTesteClasse(className);

    var inp = document.createElement("input");
    inp.setAttribute("id", "classes[" + campoId + "]");
    inp.setAttribute("type", "text");
    inp.setAttribute("name", "classes[" + campoId + "]");
    inp.setAttribute("class", className);
    inp.setAttribute("value", campoNivelValor);
    inp.setAttribute("hidden", true);


    var pai = document.getElementById("divClasses");
    pai.appendChild(inp);

    insereLinhaClasse(campoValor, campoNivelValor, className);
}

function criaCampoTesteClasse(className) {
    if (document.getElementById('teste') === null) {
        var inp = document.createElement("input");
        inp.setAttribute("id", "teste");
        inp.setAttribute("type", "text");
        inp.setAttribute("name", "teste");
        inp.setAttribute("class", className);
        inp.setAttribute("value", "teste");
        inp.setAttribute("hidden", true);

        var pai = document.getElementById("divClasses");
        pai.appendChild(inp);
    }
}

function insereLinhaClasse(valor, valorNivel, className) {
    var tableRef = document.getElementById('tabelaClasses').getElementsByTagName('tbody')[0];
    // Insert a row in the table at the last row
    var newRow = tableRef.insertRow(tableRef.rows.length);
    newRow.setAttribute("class", className);
    // Insert a cell in the row at index 0
    insereCelulaClasse(newRow, 0, "#");
    insereCelulaClasse(newRow, 1, valor);
    insereCelulaClasse(newRow, 2, valorNivel);
    insereBotaoClasse(newRow, 3, className);
}

function insereCelulaClasse(newRow, coluna, valor) {
    var newCell = newRow.insertCell(coluna);
    var newText = document.createTextNode(valor);
    newCell.appendChild(newText);
}

function insereBotaoClasse(newRow, coluna, className) {
    var a = document.createElement('a');
    //a.class = "btn btn-danger";
    a.setAttribute("class", "btn btn-info " + className);
    a.setAttribute("onClick", "removeClasse('" + className + "')");
    var linkText = document.createTextNode("Excluir");
    a.appendChild(linkText);


    var newCell = newRow.insertCell(coluna);
    newCell.appendChild(a);
}

function removeClasse(classe) {
    jQuery(function ($) {
        $("input").remove("." + classe);
        $("tr").remove("." + classe);
        $("a").remove("." + classe);
    });
}