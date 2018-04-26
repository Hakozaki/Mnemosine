<script>

    function preencheDanoModal(id, nome, batalha, rodada, turno, acao) {
        document.getElementById('jogador_origem').value = id;
        document.getElementById('jogador_origem_nome').value = nome;
        
        document.getElementById('batalha_id').value = batalha;
        document.getElementById('rodada').value = rodada;
        document.getElementById('_turno').value = turno;
        document.getElementById('acao').value = acao;
    }

    function adicionarTurno() {
        document.getElementById('frmModalDano').action = "{{ route('batalha.aplicarDano') }}";
        document.getElementById('frmModalDano').submit();
    }

    function apagaCamposEfeito() {
        document.getElementById('efeito').value = "";
        document.getElementById('duracao_efeito').value = "0";
    }

    jQuery(function ($) {
        $("#efeito_ativo").on("change", function () {
            switch ($(this).val()) {
                case "0":
                    apagaCamposEfeito();
                    $("#panel_efeito").hide();
                    break;
                case "1":
                    apagaCamposEfeito();
                    $("#panel_efeito").show();
                    break;
            }
        });

        $('#jogador_destino').on("change", function () {
            $('#tabelaEfeitos tbody tr').remove();
            if ($(this).val() !== "") {
                $.get('/batalha/retornaEfeitos/' + $('#batalha_id').val() + '/' + $(this).val(), function (turnos) {

                    $.each(turnos, function (turnoId, turnoValue) {
                        var row = $('<tr></tr>').attr({class: [].join(' ')}).appendTo($('#tabelaEfeitos'));
                        $('<td></td>').text(turnoValue.rodada).appendTo(row);
                        $('<td></td>').text(turnoValue.turno).appendTo(row);
                        $('<td></td>').text(turnoValue.acao).appendTo(row);
                        $('<td></td>').text(turnoValue.nome).appendTo(row);
                        $('<td></td>').text(turnoValue.efeito).appendTo(row);
                        $('<td></td>').text(turnoValue.duracao_efeito).appendTo(row);
                        $('<td></td>').html('<input type="checkbox" name="removeEfeito[]" id="removeEfeito[]" value="' + turnoId + '"/>').appendTo(row);
                    });
                });
            }
        });

    });
</script>


<!-- DANO -->

<div class="modal fade" id="danoModal" name="danoModal" tabindex="-1" role="dialog" aria-labelledby="danoModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="danoModalLabel">Ação</h5>               
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <form method="post" name="frmModalDano" id="frmModalDano">
                                {{ csrf_field() }}   
                                
                                <input type="hidden" name="batalha_id" id="batalha_id"/>
                                <input type="hidden" name="rodada" id="rodada"/>
                                <input type="hidden" name="_turno" id="_turno"/>                                
                                <input type="hidden" name="acao" id="acao"/>

                                <div class="row">
                                    <div class="form-group col-md-3 {{ $errors->has('jogador_origem') ? 'has-error' : '' }}">
                                        <label for="jogador_origem">ID:</label>
                                        <input type="text" name="jogador_origem" id="jogador_origem" class="form-control" placeholder="ID Jogador" readonly>                            
                                    </div> 
                                    <div class="form-group col-md-9 {{ $errors->has('jogador_origem_nome') ? 'has-error' : '' }}">
                                        <label for="jogador_origem_nome">Jogador Origem:</label>
                                        <input type="text" name="jogador_origem_nome" id="jogador_origem_nome" class="form-control" placeholder="Jogador" readonly>                            
                                    </div>  
                                </div><!-- jogador origem -->
                                <div class="row">
                                    <div class="form-group col-md-6{{ $errors->has('jogador_destino') ? 'has-error' : '' }}" >
                                        <label for="jogador_destino">Jogador Destino:</label>
                                        <select name="jogador_destino" id="jogador_destino" class="form-control selectpicker" data-live-search="true">                                       
                                            <option class="form-control" ></option>
                                            @foreach($batalha->jogadores() as $key => $personagem)                                                                
                                            <option value="{{$personagem->jogador_id}}"  class="form-control" data-tokens="{{ $personagem->nome }}">{{ $personagem->nome}}</option>                                
                                            @endforeach
                                        </select>                               
                                    </div>
                                    <div class="form-group col-md-2 {{ $errors->has('dano_cura') ? 'has-error' : '' }}">
                                        <label for="dano_cura">D/C:</label>
                                        <select class="form-control" id="dano_cura" name="dano_cura">
                                            <option value="+" >Dano</option>
                                            <option value="-" >Cura</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-4 {{ $errors->has('dano') ? 'has-error' : '' }}">
                                        <label for="dano">Dano:</label>
                                        <input type="text" name="dano" id="dano" class="form-control" placeholder="Dano">                            
                                    </div>  
                                </div><!-- jogador destino -->
                                <div class="form-group {{ $errors->has('efeito_ativo') ? 'has-error' : '' }}">
                                    <label for="efeito_ativo">Efeito Ativo:</label>
                                    <select class="form-control" id="efeito_ativo" name="efeito_ativo">
                                        <option value="0" >Não</option>
                                        <option value="1" >Sim</option>
                                    </select>
                                </div> 

                                <div class="row" name="panel_efeito" id="panel_efeito" hidden>
                                    <div class="form-group col-md-9 {{ $errors->has('efeito') ? 'has-error' : '' }}">
                                        <label for="efeito">Efeito:</label>
                                        <input type="text" name="efeito" id="efeito" class="form-control" placeholder="Efeito">                            
                                    </div> 
                                    <div class="form-group col-md-3 {{ $errors->has('duracao_efeito') ? 'has-error' : '' }}">
                                        <label for="duracao_efeito">Duração efeito:</label>
                                        <input type="text" name="duracao_efeito" id="duracao_efeito" class="form-control" placeholder="Duração do efeito" value="0">                            
                                    </div>                                      
                                </div><!-- efeito -->

                                <div>
                                    <table id="tabelaEfeitos" name="tabelaEfeitos" class="table table-bordered">
                                        <thead>
                                            <tr>                                        
                                                <th>Rodada</th>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                               
                                                <th>Turno</th>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                               
                                                <th>Ação</th>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                               
                                                <th>Jogador Origem</th>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                               
                                                <th>Efeito</th>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                               
                                                <th>Duração</th>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                               
                                                <th>Ações</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                        </tbody>
                                    </table>           
                                </div><!-- efeitos ativos -->
                            </form><!--form -->  
                        </div><!-- col-md-12 -->
                    </div><!-- row -->
                </div><!-- container-fluid -->
            </div>
            <div class="modal-footer">
                <button id="btnCancelarModal" name="btnCancelarModal" type="button" class="btn btn-secondary"  data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-primary" onclick="adicionarTurno()" data-dismiss="modal">Salvar</button>
            </div>
        </div>
    </div>
</div>
