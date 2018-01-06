function insereDominio() {
    var e = document.getElementById("dominio");
    var campoId = e.options[e.selectedIndex].value;
    var campoValor = e.options[e.selectedIndex].text;
    var className = campoId.replace(" ", "") + campoValor.replace(" ", "");
    className = className.replace(" ", "");

    criaCampoTesteDominio(className);

    var inp = document.createElement("input");
    inp.setAttribute("id", "dominios[" + campoId + "]");
    inp.setAttribute("type", "text");
    inp.setAttribute("name", "dominios[" + campoId + "]");
    inp.setAttribute("class", className);
    inp.setAttribute("value", campoValor);
    inp.setAttribute("hidden", true);


    var pai = document.getElementById("divDominios");
    pai.appendChild(inp);

    insereLinhaDominio(campoValor, className);
}

function criaCampoTesteDominio(className) {
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

function insereLinhaDominio(valor, className) {
    var tableRef = document.getElementById('tabelaDominios').getElementsByTagName('tbody')[0];
    // Insert a row in the table at the last row
    var newRow = tableRef.insertRow(tableRef.rows.length);
    newRow.setAttribute("class", className);
    // Insert a cell in the row at index 0
    insereCelulaDominio(newRow, 0, "#");
    insereCelulaDominio(newRow, 1, valor);
    insereBotaoDominio(newRow, 2, className);
}

function insereCelulaDominio(newRow, coluna, valor) {
    var newCell = newRow.insertCell(coluna);
    var newText = document.createTextNode(valor);
    newCell.appendChild(newText);
}

function insereBotaoDominio(newRow, coluna, className) {
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