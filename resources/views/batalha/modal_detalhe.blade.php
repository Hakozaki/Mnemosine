<script>

    function preencheDanoModal(id, nome) {
        document.getElementById('jogador_origem').value = id;
        document.getElementById('jogador_origem_nome').value = nome;
    }

    function adicionarPersonagem() {
        document.getElementById('frmModalDano').action = "{{ route('batalha.aplicarDano') }}";
        document.getElementById('frmModalDano').submit();
    }

    jQuery(function ($) {
        $("#efeito_ativo").on("change", function () {
            if ($("#efeito_ativo").val() === "0") {
                console.log('0');
                $("#panel_efeito").show();
            }
            if ($("#efeito_ativo").val() === "1") {
                console.log('1');
                $("#panel_efeito").hide();
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
                                <input type="hidden" name="batalha_id" id="batalha_id">
                                <input type="hidden" name="turno_id" id="turno_id">
                                <input type="hidden" name="acao" id="acao">

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
                                            @foreach($batalha->personagens() as $key => $personagem)                                                                
                                            <option value="{{$personagem->id}}"  class="form-control" data-tokens="{{ $personagem->nome }}">{{ $personagem->nome}}</option>                                
                                            @endforeach
                                        </select>                               
                                    </div>
                                    <div class="form-group col-md-6 {{ $errors->has('dano') ? 'has-error' : '' }}">
                                        <label for="dano">Dano:</label>
                                        <input type="text" name="dano" id="dano" class="form-control" placeholder="Dano">                            
                                    </div>  
                                </div><!-- jogador destino -->
                                <div class="form-group {{ $errors->has('efeito_ativo') ? 'has-error' : '' }}">
                                    <label for="efeito_ativo">Efeito Ativo:</label>
                                    <input type="radio" name="efeito_ativo" id="efeito_ativo" value="1" >Sim
                                    <input type="radio" name="efeito_ativo" id="efeito_ativo" value="0" checked>Não
                                </div> 
                                <div class="row" name="panel_efeito" id="panel_efeito">
                                    TESTE
                                </div>
                            </form><!--form -->  
                        </div><!-- col-md-12 -->
                    </div><!-- row -->
                </div><!-- container-fluid -->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" onclick="adicionarPersonagem()" data-dismiss="modal">Save changes</button>
            </div>
        </div>
    </div>
</div>
