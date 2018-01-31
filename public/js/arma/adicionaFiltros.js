var contador = 1;

function insereFiltro() {
    var eFiltro = document.getElementById("filtro");
    var filtroValor = eFiltro.value;

    var eCampo = document.getElementById("campo");
    var campoId = eCampo.options[eCampo.selectedIndex].value;

    var eOperador = document.getElementById("operador");
    var operadorValor = eOperador.value;

    criarInput(contador, campoId, "divCamposFiltro");
    criarInput(contador, operadorValor, "divCamposFiltro");
    criarInput(contador, filtroValor, "divCamposFiltro");
    
    var filtros = campoId + " " + operadorValor + " " + filtroValor;   
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
    var txt = document.createTextNode(valor);
    sp.appendChild(txt);

    var pai = document.getElementById(container);
    pai.appendChild(sp);
}

