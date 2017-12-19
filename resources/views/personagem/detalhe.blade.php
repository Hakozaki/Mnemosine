@extends('layouts.app')

@section('content')
<!--  -->
<script src="/js/jquery-3.1.1.min.js"></script>
<script src="/js/jquery.mask.min.js"></script>

<script src="/js/personagem/adicionaTalentos.js"></script>
<!-- -->

<div class="container">
    <div class="row">
        <div class="col-md-12 ">
            <div class="panel panel-default">             
                <div class="breadcrumb panel-heading">
                    <li><a href="{{ route('personagem.index') }}">Personagem</a></li>
                    <li class="active">Detalhe</li>
                </div>
                <div class="panel-body">
                    <ul class="nav nav-tabs">
                        <li class="active"><a data-toggle="tab" href="#home">Caracteristicas</a></li>
                        <li><a data-toggle="tab" href="#menu1">Atributos</a></li>
                        <li><a data-toggle="tab" href="#menu2">Testes</a></li>
                        <li><a data-toggle="tab" href="#menu3">Talentos</a></li>
                    </ul><!-- menus -->  
                    <form action=" {{ route('personagem.salvar') }} " method="post">
                        {{ csrf_field() }}
                        <input name="id" type="hidden" value="{{$personagem->id}}"/>                        
                        <input name="jogador_id" type="hidden" value="{{ Auth::user()->id }}"/>    
                        <div class="tab-content">
                            <div id="home" class="tab-pane fade in active">
                                @include('personagem.caracteristicas') 
                            </div><!-- TAB 01 (home) 'CARACTERISTICAS'-->

                            <div id="menu1" class="tab-pane fade">
                                @include('personagem.atributos')                                 
                            </div><!-- TAB 02 (menu1) 'ATRIBUTOS'-->

                            <div id="menu2" class="tab-pane fade">
                                @include('personagem.testes')
                            </div><!-- TAB 03 (menu2) 'TESTES'-->

                            <div id="menu3" class="tab-pane fade">
                                @include('personagem.talentos')
                            </div><!-- TAB 04 (menu3) 'TALENTOS'-->

                            <button class="btn btn-info">Salvar</a>                            

                        </div><!-- tab-content -->
                    </form><!-- FORM -->
                </div> <!-- panel-body -->
            </div><!-- panel-default -->
        </div><!-- panel col-md-12 -->
    </div>
</div>
@endsection
