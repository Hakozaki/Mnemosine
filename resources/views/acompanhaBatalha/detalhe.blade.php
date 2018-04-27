@extends('layouts.app')

@section('content')

<!--  -->
<script src="/js/jquery-3.1.1.min.js"></script>
<script src="/js/jquery.mask.min.js"></script>
<!-- -->
<script src="/js/bootstrap-select.min.js"></script>
<script src="/js/acompanhaBatalha/acompanhaBatalha.js"></script>
<link href="/css/bootstrap-select.min.css" rel="stylesheet">


<div class="container-fluid">
    <div class="row">
        <div class="col-md-12 ">
            <div class="panel panel-default">             
                <div class="breadcrumb panel-heading">
                    <li><a href="{{ route('acompanhaBatalha.index') }}">Acompanha Batalha</a></li>
                    <li class="active">Detalhe</li>
                </div>

                <div class="panel-body">   
                    <form method="post" name="frm" id="frm">
                        {{ csrf_field() }}

                        <div>                           
                            <div class="form-group col-md-3">
                                <label for="id">Código:</label>                                
                                <input type="text" name="batalha_id" id="batalha_id" class="form-control" value="{{ $batalha->id }}" placeholder="Código" readonly>                                                                                                
                            </div>                       
                            <div class="form-group col-md-3 ">
                                <label for="rodada">Rodada:</label>
                                <input type="text" name="rodada" id="rodada" class="form-control" value="{{ $batalha->rodada }}" placeholder="Rodada" readonly>                            

                            </div>                       
                            <div class="form-group col-md-3">
                                <label for="turno">Turno:</label>
                                <input type="text" name="turno" id="turno" class="form-control" value="{{ $batalha->turno }}" placeholder="Turno" readonly>                            

                            </div>                                                   
                            <div class="form-group col-md-3">
                                <label for="acao">Ação:</label>
                                <input type="text" name="acao"  id="acao" class="form-control" value="{{ $batalha->acao }}" placeholder="Ação" readonly>                            
                            </div>                                                                               
                        </div>   
                        <!-- Painel de CABEÇALHO -->

                        <table id="tabelaJogadores" name="tabelaJogadores" class="table table-bordered">
                            <thead>
                                <tr>                                        
                                    <th>Turno</th>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                               
                                    <th>Iniciativa</th>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                               
                                    <th>Jogador</th>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                               
                                    <th>PV Total</th>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                               
                                    <th>Dano</th>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                               
                                    <th>PV Atual</th>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                   
                                    <th>Vida</th>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                   
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>    

                        <table id="tabelaTurnos" name="tabelaTurnos" class="table table-bordered">
                            <thead>
                                <tr>                                        
                                    <th>Rodada</th>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                               
                                    <th>Turno</th>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                               
                                    <th>Ação</th>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                               
                                    <th>Jogador Origem</th>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                               
                                    <th>Jogador Destino</th>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                               
                                    <th>Dano</th>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                               
                                    <th>Efeito</th>
                                    <th>Duração Efeito</th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>    
                        <!-- Painel de USUÁRIO -->
                    </form>
                </div> <!-- panel-body -->
            </div><!-- panel-default -->
        </div><!-- panel col-md-12 -->
    </div>
</div>
@endsection
