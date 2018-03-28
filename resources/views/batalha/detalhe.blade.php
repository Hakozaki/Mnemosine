@extends('layouts.app')

@section('content')

<!--  -->
<script src="/js/jquery-3.1.1.min.js"></script>
<script src="/js/jquery.mask.min.js"></script>
<!-- -->
<script src="/js/bootstrap-select.min.js"></script>
<link href="/css/bootstrap-select.min.css" rel="stylesheet">

<script>
    jQuery(function ($) {
        $("#jogador").change(function () {
            var personagem;
            $("select option:selected").each(function () {
                if ($(this).val() !== "") {
                    personagem = JSON.parse($(this).val());
                    $("#jogador_id").val(personagem.id);
                    $("#pv").val(personagem.pv);
                }
            });
        }).trigger("change");
    });

    function adicionarPersonagem() {
        document.getElementById('frm').action = "{{ route('batalha.adicionarPersonagem') }}";
    }

</script>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-12 ">
            <div class="panel panel-default">             
                <div class="breadcrumb panel-heading">
                    <li><a href="{{ route('batalha.index') }}">Batalha</a></li>
                    <li class="active">Detalhe</li>
                </div>

                <div class="panel-body">   
                    <form method="post" name="frm" id="frm">
                        {{ csrf_field() }}
                        <div>                           
                            <div class="form-group col-md-3 {{ $errors->has('id') ? 'has-error' : '' }}">
                                <label for="id">Código:</label>
                                <input type="text" name="id" class="form-control" value="{{ $batalha->id }}" placeholder="Código" readonly>                            
                                <input type="hidden" name="batalha_id" value="{{ $batalha->id }}">                            
                            </div>                       
                            <div class="form-group col-md-3 {{ $errors->has('rodada') ? 'has-error' : '' }}">
                                <label for="rodada">Rodada:</label>
                                <input type="text" name="rodada" class="form-control" value="{{ $batalha->rodada }}" placeholder="Rodada" readonly>                            
                            </div>                       
                            <div class="form-group col-md-3 {{ $errors->has('turno') ? 'has-error' : '' }}">
                                <label for="turno">Turno:</label>
                                <input type="text" name="turno" class="form-control" value="{{ $batalha->turno }}" placeholder="Turno" readonly>                            
                            </div>                                                   
                            <div class="form-group col-md-3">
                                <label for="acao">Ação:</label>
                                <input type="text" name="acao" class="form-control" placeholder="Ação" readonly>                            
                            </div>                                                   
                        </div>   
                        <!-- Painel de CABEÇALHO -->

                        <div>
                            <div class="form-group col-md-4{{ $errors->has('Personagem') ? 'has-error' : '' }}" >
                                <label for="jogador">Personagem:</label>
                                <select name="jogador" id="jogador" class="form-control selectpicker" data-live-search="true">                                       
                                    <option class="form-control" ></option>
                                    @foreach($batalha->personagens() as $key => $personagem)                                                                
                                    <option value="{{$personagem}}"  class="form-control" data-tokens="{{ $personagem->nome }}">{{ $personagem->nome}}</option>                                
                                    @endforeach
                                </select>                               
                            </div>

                            <input type="hidden" name="jogador_id" id="jogador_id" >                            

                            <div class="form-group col-md-4 {{ $errors->has('pv') ? 'has-error' : '' }}">
                                <label for="pv">PV:</label>
                                <input type="text" name="pv" id="pv" class="form-control" value="{{ $batalha->pv }}" placeholder="Pontos de vida" >                            
                            </div>

                            <div class="form-group col-md-4 {{ $errors->has('iniciativa') ? 'has-error' : '' }}">
                                <label for="iniciativa">Iniciativa:</label>
                                <div class="input-group">
                                    <input type="text" name="iniciativa" id="iniciativa" class="form-control" value="{{ $batalha->iniciativa }}" placeholder="Iniciativa" >                            
                                    <span class="input-group-btn">                                                                                                                                                                                
                                        <button class="btn btn-default" onclick="adicionarPersonagem()">Adicionar</button>                                        
                                    </span>
                                </div>
                            </div>  

                            <table class="table table-bordered">
                                <thead>
                                    <tr>                                        
                                        <th>Posição</th>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                               
                                        <th>Iniciativa</th>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                               
                                        <th>Jogador</th>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                               
                                        <th>PV</th>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                               
                                        <th>DANO</th>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                               
                                        <th>Ações</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($batalha->jogadores() as $jogador)				
                                    <tr>

                                        <th scope="row">{{ $jogador->posicao }}</th>                                        
                                        <td>{{ $jogador->iniciativa }}</td>                                                                                                                                                                                                                                                                                                                                                                                                                            
                                        <td>{{ $jogador->nome }}</td>                                                                                                                                                                                                                                                                                                                                                                                                                            
                                        <td>{{ $jogador->pv }}</td>                                                                                                                                                                                                                                                                                                                                                                                                                                                                    
                                        <td>{{ $jogador->pv }}</td>                                                                                                                                                                                                                                                                                                                                                                                                                                                                    
                                        <td>
                                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#danoModal" 
                                                    onclick="preencheDanoModal('<?php echo $jogador->id ?>', '<?php echo $jogador->nome ?>')">
                                                Atacar
                                            </button>
                                            <a href="#" class="btn btn-success">Curar</a>
                                        </td>
                                    </tr>
                                    @endforeach		
                                </tbody>
                            </table>                                                        
                        </div>
                        <!-- Painel de USUÁRIO -->
                    </form>
                </div> <!-- panel-body -->
            </div><!-- panel-default -->
        </div><!-- panel col-md-12 -->
    </div>
</div>
@include('batalha.modal_detalhe') 
@endsection
