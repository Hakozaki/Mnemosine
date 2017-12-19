function insereTalento() {
    var e = document.getElementById("talento");

    var campoId = e.options[e.selectedIndex].value;
    var campoValor = e.options[e.selectedIndex].text;

    var className = campoId.replace(" ", "") + campoValor.replace(" ", "");
    className = className.replace(" ", "");

    criaCampoTesteTalento(className);

    var inp = document.createElement("input");
    inp.setAttribute("id", "dominios[" + campoId + "]");
    inp.setAttribute("type", "text");
    inp.setAttribute("name", "dominios[" + campoId + "]");
    inp.setAttribute("class", className);
    inp.setAttribute("value", campoValor);
    inp.setAttribute("hidden", true);


    var pai = document.getElementById("divTalentos");
    pai.appendChild(inp);

    insereLinhaTalento(campoValor, className);
}

function criaCampoTesteTalento(className) {
    if (document.getElementById('teste') === null) {
        var inp = document.createElement("input");
        inp.setAttribute("id", "teste");
        inp.setAttribute("type", "text");
        inp.setAttribute("name", "teste");
        inp.setAttribute("class", className);
        inp.setAttribute("value", "teste");
        inp.setAttribute("hidden", true);

        var pai = document.getElementById("divTalentos");
        pai.appendChild(inp);
    }
}

function insereLinhaTalento(valor, className) {
    var tableRef = document.getElementById('tabelaTalentos').getElementsByTagName('tbody')[0];
    // Insert a row in the table at the last row
    var newRow = tableRef.insertRow(tableRef.rows.length);
    newRow.setAttribute("class", className);
    // Insert a cell in the row at index 0
    insereCelulaTalento(newRow, 0, "#");
    insereCelulaTalento(newRow, 1, valor);
    insereBotaoTalento(newRow, 2, className);
}

function insereCelulaTalento(newRow, coluna, valor) {
    var newCell = newRow.insertCell(coluna);
    var newText = document.createTextNode(valor);
    newCell.appendChild(newText);
}

function insereBotaoTalento(newRow, coluna, className) {
    var a = document.createElement('a');
    //a.class = "btn btn-danger";
    a.setAttribute("class", "btn btn-info " + className);
    a.setAttribute("onClick", "removeTalento('" + className + "')");
    var linkText = document.createTextNode("Excluir");
    a.appendChild(linkText);


    var newCell = newRow.insertCell(coluna);
    newCell.appendChild(a);
}

function removeTalento(talento) {
    jQuery(function ($) {
        $("input").remove("." + talento);
        $("tr").remove("." + talento);
        $("a").remove("." + talento);
    });
}