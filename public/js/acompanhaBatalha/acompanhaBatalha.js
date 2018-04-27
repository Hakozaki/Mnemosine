jQuery(function ($) {

    $("#tabelaJogadores").ready(function () {
        _carrega();
        setInterval(_carrega, 5000);
    });//FIM CARREGA

    function _carrega() {
        _batalha();
        _tabelaJogadores();
        _tabelaTurnos();
    }//FIM _carrega()

    function _tabelaJogadores() {
        $.get('/acompanhaBatalha/retornaJogadores/' + $('#batalha_id').val(), function (jogadores) {
            $('#tabelaJogadores tbody tr').remove();
            $.each(jogadores, function (jogadorId, jogadorValue) {
                var row = $('<tr></tr>').attr({class: [].join(' ')}).appendTo($('#tabelaJogadores'));
                $('<td></td>').text(jogadorValue.posicao).appendTo(row);
                $('<td></td>').text(jogadorValue.iniciativa).appendTo(row);
                $('<td></td>').text(jogadorValue.nome).appendTo(row);
                $('<td></td>').text(jogadorValue.pv).appendTo(row);
                $('<td></td>').text(jogadorValue.dano).appendTo(row);
                $('<td></td>').text(jogadorValue.pv - jogadorValue.dano).appendTo(row);
                var porcentagem = (jogadorValue.pv - jogadorValue.dano) / jogadorValue.pv * 100;
                var corBarra;
                
                if (porcentagem <= 50) {
                    corBarra = 'progress-bar bg-success';
                } else {
                    if (porcentagem <= 20) {
                        corBarra = 'progress-bar bg-danger';
                    } else {
                        corBarra = 'progress-bar bg-warning';
                    }
                }
                
                $('<td></td>').html('<div class="progress"> \n\
                                        <div class="' + corBarra + '" role="progressbar" aria-valuenow="' + jogadorValue.dano + '" aria-valuemin="0" \n\
                                             aria-valuemax="' + jogadorValue.pv + '" style="width:' + porcentagem + '%">\n\
                                        </div> \n\
                                    </div>'
                        ).appendTo(row);
            });//FIM EACH
        });//FIM GET
    }//FIM _tabelaJogadores()

    function _tabelaTurnos() {
        $.get('/acompanhaBatalha/retornaTurnos/' + $('#batalha_id').val(), function (jogadores) {
            $('#tabelaTurnos tbody tr').remove();
            $.each(jogadores, function (turnoId, turnoValue) {
                var rowt = $('<tr></tr>').attr({class: [].join(' ')}).appendTo($('#tabelaTurnos'));
                $('<td></td>').text(turnoValue.rodada).appendTo(rowt);
                $('<td></td>').text(turnoValue.turno).appendTo(rowt);
                $('<td></td>').text(turnoValue.acao).appendTo(rowt);
                $('<td></td>').text(turnoValue.jogadororigem).appendTo(rowt);
                $('<td></td>').text(turnoValue.jogadordestino).appendTo(rowt);
                $('<td></td>').text(turnoValue.dano).appendTo(rowt);
                $('<td></td>').text(turnoValue._efeito).appendTo(rowt);
                $('<td></td>').text(turnoValue.duracao_efeito).appendTo(rowt);
            });//FIM EACH
        });//FIM GET
    }//FIM _tabelTurnos()

    function _batalha() {
        $.get('/acompanhaBatalha/retornaBatalha/' + $('#batalha_id').val(), function (batalha) {
            $('#rodada').val(batalha[0].rodada);
            $('#turno').val(batalha[0].turno);
            $('#acao').val(batalha[0].acao);
        });
    }//FIM _batalha


});//FIM JQUERY