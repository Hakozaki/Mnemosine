<script>
    function preencheCuraModal(id, nome, batalha, turno, acao) {
        document.getElementById('cura_jogador_origem').value = id;
        document.getElementById('cura_jogador_origem_nome').value = nome;

        document.getElementById('cura_batalha_id').value = batalha;
        document.getElementById('cura_turno_id').value = turno;
        document.getElementById('cura_acao').value = acao;
    }

    function adicionarTurnoCura() {
        document.getElementById('frmModalCura').action = "{{ route('batalha.aplicarCura') }}";
        document.getElementById('frmModalCura').submit();
    }
</script>


<!-- CURA -->
<div class="modal fade" id="curaModal" name="curaModal" tabindex="-1" role="dialog" aria-labelledby="curaModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="curaModalLabel">Ação</h5>               
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <form method="post" name="frmModalCura" id="frmModalCura">
                                {{ csrf_field() }}    
                                <input type="hidden" name="cura_batalha_id" id="batalha_id">
                                <input type="hidden" name="cura_turno_id" id="turno_id">
                                <input type="hidden" name="cura_acao" id="acao">

                                <div class="row">
                                    <div id="djoc" class="form-group col-md-3 {{ $errors->has('cura_jogador_origem') ? 'has-error' : '' }}">
                                        <label for="cura_jogador_origem">ID:</label>
                                        <input type="text" name="cura_jogador_origem" id="cura_jogador_origem" class="form-control" placeholder="ID Jogador" readonly>                            
                                    </div> 
                                    <div id="djocn" class="form-group col-md-9 {{ $errors->has('cura_jogador_origem_nome') ? 'has-error' : '' }}">
                                        <label for="cura_jogador_origem_nome">Jogador Origem:</label>
                                        <input type="text" name="cura_jogador_origem_nome" id="cura_jogador_origem_nome" class="form-control" placeholder="Jogador" readonly>                            
                                    </div>  
                                </div><!-- jogador origem -->
                                <div class="row">
                                    <div class="form-group col-md-6{{ $errors->has('cura_jogador_destino') ? 'has-error' : '' }}" >
                                        <label for="cura_jogador_destino">Jogador Destino:</label>
                                        <select name="cura_jogador_destino" id="cura_jogador_destino" class="form-control selectpicker" data-live-search="true">                                       
                                            <option class="form-control" ></option>
                                            @foreach($batalha->personagens() as $key => $personagem)                                                                
                                            <option value="{{$personagem->id}}"  class="form-control" data-tokens="{{ $personagem->nome }}">{{ $personagem->nome}}</option>                                
                                            @endforeach
                                        </select>                               
                                    </div>
                                    <div class="form-group col-md-6 {{ $errors->has('cura_dano') ? 'has-error' : '' }}">
                                        <label for="cura_dano">Dano:</label>
                                        <input type="text" name="cura_dano" id="cura_dano" class="form-control" placeholder="Dano">                            
                                    </div>  
                                </div><!-- jogador destino -->

                            </form><!--form -->  
                        </div><!-- col-md-12 -->
                    </div><!-- row -->
                </div><!-- container-fluid -->
            </div><!-- modal-body -->
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                <button type="button" class="btn btn-primary" onclick="adicionarTurnoCura()" data-dismiss="modal">Salvar</button>
            </div>
        </div>
    </div>
</div>
