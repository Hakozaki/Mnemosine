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
        $("#jogador").on("change", function () {
            if ($(this).val() !== "") {
                var personagem;
                personagem = JSON.parse($(this).val());
                $("#jogador_id").val(personagem.id);
                $("#pv").val(personagem.pv);
            }
        });

        $("#tabelaJogadores").ready(function () {
            $('#linha' + $("#turno").val()).css("background", "#e6e6e6");
            $('#linha' + $("#turno").val()).css("fontWeight", "bold");

        });
    });

    function adicionarPersonagem() {
        document.getElementById('frm').action = "{{ route('batalha.adicionarPersonagem') }}";
        document.getElementById('frm').submit();
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
                                <div class="input-group">
                                    <input type="text" name="id" class="form-control" value="{{ $batalha->id }}" placeholder="Código" readonly>                            
                                    <span class="input-group-btn">                                                                                                                                                                                                                        
                                        <a class="btn btn-default" href="javascript:confirm('Deseja reordenar por iniciativas?') ? 
                                           window.location.href='{{ route('batalha.ordenarIniciativa',$batalha->id) }}' : false">Ordernar</a>

                                    </span>
                                </div>
                                <input type="hidden" name="batalha_id" value="{{ $batalha->id }}">                            
                            </div>                       
                            <div class="form-group col-md-3 {{ $errors->has('rodada') ? 'has-error' : '' }}">
                                <label for="rodada">Rodada:</label>
                                <div class="input-group">
                                    <input type="text" name="rodada" class="form-control" value="{{ $batalha->rodada }}" placeholder="Rodada" readonly>                            
                                    <span class="input-group-btn">                                                                                                                                                                                
                                        <a class="btn btn-default" href="javascript:confirm('Proxima Rodada?') ? 
                                           window.location.href='{{ route('batalha.passaRodada',$batalha->id) }}' : false">Passar Rodada</a>
                                    </span>
                                </div>
                            </div>                       
                            <div class="form-group col-md-3 {{ $errors->has('turno') ? 'has-error' : '' }}">
                                <label for="turno">Turno:</label>
                                <div class="input-group">
                                    <input type="text" id="turno" name="turno" class="form-control" value="{{ $batalha->turno }}" placeholder="Turno" readonly>                            
                                    <span class="input-group-btn">                                                                                                                                                                                
                                        <a class="btn btn-default" href="javascript:confirm('Proximo turno?') ? 
                                           window.location.href='{{ route('batalha.passaTurno',$batalha->id) }}' : false">Passar Turno</a>                                        
                                    </span>
                                </div>
                            </div>                                                   
                            <div class="form-group col-md-3 {{ $errors->has('acao') ? 'has-error' : '' }}">
                                <label for="acao">Ação:</label>
                                <input type="text" name="acao" class="form-control" value="{{ $batalha->acao }}" placeholder="Ação" readonly>                            
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
                                        <a class="btn btn-default" onclick="adicionarPersonagem()">Adicionar</a>                                        
                                    </span>
                                </div>
                            </div>  

                            <table id="tabelaJogadores" name="tabelaJogadores" class="table table-bordered">
                                <thead>
                                    <tr>                                        
                                        <th>Turno</th>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                               
                                        <th>Iniciativa</th>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                               
                                        <th>Jogador</th>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                               
                                        <th>PV Total</th>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                               
                                        <th>Dano</th>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                               
                                        <th>PV Atual</th>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                               
                                        <th>Ações</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($batalha->jogadores() as $jogador)				
                                    <tr id="linha{{ $jogador->posicao }}" name="linha{{ $jogador->posicao }}">

                                        <th scope="row">{{ $jogador->posicao }}</th>                                        
                                        <td>{{ $jogador->iniciativa }}</td>                                                                                                                                                                                                                                                                                                                                                                                                                            
                                        <td>{{ $jogador->nome }}</td>                                                                                                                                                                                                                                                                                                                                                                                                                            
                                        <td>{{ $jogador->pv }}</td>                                                                                                                                                                                                                                                                                                                                                                                                                                                                    
                                        <td>{{ $jogador->dano }}</td>                                                                                                                                                                                                                                                                                                                                                                                                                                                                    
                                        <td>{{ $jogador->pv - $jogador->dano }}</td>                                                                                                                                                                                                                                                                                                                                                                                                                                                                    
                                        <td>
                                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#danoModal" 
                                                    onclick=" preencheDanoModal('<?php echo $jogador->id ?>',
                                                                    '<?php echo $jogador->nome ?>',
                                                                    '<?php echo $batalha->id ?>',
                                                                    '<?php echo $batalha->turno ?>',
                                                                    '<?php echo $batalha->acao ?>')">
                                                Atacar
                                            </button>
                                            <a href="#" class="btn btn-success">Curar</a>

                                            <a class="btn btn-default" href="javascript:confirm('Deseja subir o jogador de posição?') ? 
                                               window.location.href='{{ route('batalha.subirPosicao',[$batalha->id,$jogador->id]) }}' : false">
                                                <span class="glyphicon glyphicon-arrow-up"></span>
                                            </a>

                                            <a type="button" class="btn btn-default"><span class="glyphicon glyphicon-arrow-down"></span></a>
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
@include('batalha.dano') 
@endsection
