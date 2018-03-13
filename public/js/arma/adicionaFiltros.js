var contador = 1;

function insereFiltro() {
    var eFiltro = document.getElementById("filtro");
    var filtroValor = eFiltro.value;

    var eCampo = document.getElementById("campo");
    var campoValor = eCampo.options[eCampo.selectedIndex].value;
    var campoTexto = eCampo.options[eCampo.selectedIndex].text;

    var eOperador = document.getElementById("operador");
    var operadorValor = eOperador.options[eOperador.selectedIndex].value;
    var operadorTexto = eOperador.options[eOperador.selectedIndex].text;

    criarInput(contador, campoValor, "divCamposFiltro");
    criarInput(contador, operadorValor, "divCamposFiltro");
    if (operadorValor === 'ilike') {
        criarInput(contador, "%" + filtroValor + "%", "divCamposFiltro");
    } else {
        criarInput(contador, filtroValor, "divCamposFiltro");
    }

    var filtros = campoTexto + " " + operadorTexto + " '" + filtroValor + "'";
    criarSpan(filtros, "divCamposFiltroM");

    contador += 1;
}

function criarInput(nome, valor, container) {
    var inp = document.createElement("input");
    inp.setAttribute("id", "filtros[" + nome + "][]");
    inp.setAttribute("type", "text");
    inp.setAttribute("name", "filtros[" + nome + "][]");
    inp.setAttribute("value", valor);
    inp.setAttribute("hidden", true);

    var pai = document.getElementById(container);
    pai.appendChild(inp);
}

function criarSpan(valor, container) {
    var sp = document.createElement("button");
    sp.setAttribute("class", "btn btn-primary");
    sp.setAttribute("disabled", true);
    sp.setAttribute("style", "margin-right : 5px; margin-top : 5px");
    var txt = document.createTextNode(valor);
    sp.appendChild(txt);

    var pai = document.getElementById(container);
    pai.appendChild(sp);
}

