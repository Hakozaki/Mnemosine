var contador = 1;

function insereFiltro() {
    var eFiltro = document.getElementById("filtro");
    var filtroValor = eFiltro.value;

    if (filtroValor === "") {
        criaAlerta("Valor não pode ser vazio!", "divCamposFiltroM");
        return;
    }        

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

function criaAlerta(mensagem, container) {
    var div = document.createElement("div");
    div.setAttribute("class", "alert alert-warning alert-dismissible");
    
    var texto = document.createTextNode(mensagem);    
    div.appendChild(texto);
    
    var fechar = document.createElement("a");
    fechar.setAttribute("href","#");
    fechar.setAttribute("class","close");
    fechar.setAttribute("data-dismiss","alert");
    fechar.setAttribute("arial-label","close");    
    fechar.textContent='x';
                
    div.appendChild(fechar);
    

    var pai = document.getElementById(container);
    pai.appendChild(div);
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

