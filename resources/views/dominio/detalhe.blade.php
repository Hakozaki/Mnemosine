@extends('layouts.app')

@section('content')

<script src="/js/jquery-3.1.1.min.js"></script>
<script src="/js/bootstrap-select.min.js"></script>
<link href="/css/bootstrap-select.min.css" rel="stylesheet">

<div class="container">
    <div class="row">
        <div class="col-md-12 ">
            <div class="panel panel-default">             
                <div class="breadcrumb panel-heading">
                    <li><a href="{{ route('dominio.index') }}">Domínio</a></li>
                    <li class="active">Detalhe</li>
                </div>

                <div class="panel-body">
                    <form action=" {{ route('dominio.salvar') }} " method="post">
                        {{ csrf_field() }}
                        <input name="id" type="hidden" value="{{$dominio->id}}"/>                        

                        <div class="form-group {{ $errors->has('nome') ? 'has-error' : '' }}">
                            <label for="nome">Nome:</label>
                            <input type="text" name="nome" class="form-control" value="{{ $dominio->nome }}" placeholder="Nome">
                            @if($errors->has('nome'))
                            <span class="help-block">
                                <strong>{{ $errors->first('nome') }}</strong>								
                            </span>
                            @endif
                        </div>

                        <div class="form-group {{ $errors->has('poderes') ? 'has-error' : '' }}">
                            <label for="poderes">Poderes:</label>
                            <textarea name="poderes" style="max-width:100%" class="form-control" 
                                      value="{{ $dominio->poderes }}" placeholder="Poderes concedidos pelo dominio">{{ $dominio->poderes }}</textarea>
                            @if($errors->has('poderes'))
                            <span class="help-block">
                                <strong>{{ $errors->first('poderes') }}</strong>								
                            </span>
                            @endif
                        </div>   

                        <table class="table form-group">
                            <thead>
                                <tr>
                                    <th style="width: 2px">Nivel</th>
                                    <th>Magia</th>                                    
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1°</td>
                                    <td> <div class="form-group {{ $errors->has('magia1') ? 'has-error' : '' }}" >                                            

                                            <select name="magia1" class="form-control selectpicker" data-live-search="true" value="{{ $dominio->magia1 }}">                                                                                   
                                                @foreach($dominio->magias1() as $magia1)                                                                
                                                <option value="{{$magia1->id}}"  <?php echo $magia1->id == $dominio->magia1 ? 'selected' : ''; ?> class="form-control" data-tokens="{{ $magia1->nome }}">{{ $magia1->nome }}</option>                                
                                                @endforeach
                                            </select>

                                            @if($errors->has('magia1'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('magia1') }}</strong>								
                                            </span>
                                            @endif
                                        </div> </td>
                                </tr>
                                <tr>
                                    <td>2°</td>
                                    <td><div class="form-group {{ $errors->has('magia2') ? 'has-error' : '' }}" >                                            

                                            <select name="magia2" class="form-control selectpicker" data-live-search="true" value="{{ $dominio->magia2 }}">                                                                                   
                                                @foreach($dominio->magias2() as $magia2)                                                                
                                                <option value="{{$magia2->id}}"  <?php echo $magia2->id == $dominio->magia2 ? 'selected' : ''; ?> class="form-control" data-tokens="{{ $magia2->nome }}">{{ $magia2->nome }}</option>                                
                                                @endforeach
                                            </select>

                                            @if($errors->has('magia2'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('magia2') }}</strong>								
                                            </span>
                                            @endif
                                        </div></td>
                                </tr>
                                <tr>
                                    <td>3°</td>
                                    <td><div class="form-group {{ $errors->has('magia3') ? 'has-error' : '' }}" >                                            

                                            <select name="magia3" class="form-control selectpicker" data-live-search="true" value="{{ $dominio->magia3 }}">                                                                                   
                                                @foreach($dominio->magias3() as $magia3)                                                                
                                                <option value="{{$magia3->id}}"  <?php echo $magia3->id == $dominio->magia3 ? 'selected' : ''; ?> class="form-control" data-tokens="{{ $magia3->nome }}">{{ $magia3->nome }}</option>                                
                                                @endforeach
                                            </select>

                                            @if($errors->has('magia3'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('magia3') }}</strong>								
                                            </span>
                                            @endif
                                        </div></td>
                                </tr>
                                <tr>
                                    <td>4°</td>
                                    <td><div class="form-group {{ $errors->has('magia4') ? 'has-error' : '' }}" >                                            

                                            <select name="magia4" class="form-control selectpicker" data-live-search="true" value="{{ $dominio->magia4 }}">                                   
                                                
                                                @foreach($dominio->magias4() as $magia4)                                                                
                                                <option value="{{$magia4->id}}"  <?php echo $magia4->id == $dominio->magia4 ? 'selected' : ''; ?> class="form-control" data-tokens="{{ $magia4->nome }}">{{ $magia4->nome }}</option>                                
                                                @endforeach
                                            </select>

                                            @if($errors->has('magia4'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('magia4') }}</strong>								
                                            </span>
                                            @endif
                                        </div></td>
                                </tr>
                                <tr>
                                    <td>5°</td>
                                    <td><div class="form-group {{ $errors->has('magia5') ? 'has-error' : '' }}" >                                            

                                            <select name="magia5" class="form-control selectpicker" data-live-search="true" value="{{ $dominio->magia5 }}">                                                                                  
                                                @foreach($dominio->magias5() as $magia5)                                                                
                                                <option value="{{$magia5->id}}"  <?php echo $magia5->id == $dominio->magia5 ? 'selected' : ''; ?> class="form-control" data-tokens="{{ $magia5->nome }}">{{ $magia5->nome }}</option>                                
                                                @endforeach
                                            </select>

                                            @if($errors->has('magia5'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('magia5') }}</strong>								
                                            </span>
                                            @endif
                                        </div></td>
                                </tr>
                                <tr>
                                    <td>6°</td>
                                    <td><div class="form-group {{ $errors->has('magia6') ? 'has-error' : '' }}" >                                            

                                            <select name="magia6" class="form-control selectpicker" data-live-search="true" value="{{ $dominio->magia6 }}">                                                                                   
                                                @foreach($dominio->magias6() as $magia6)                                                                
                                                <option value="{{$magia6->id}}"  <?php echo $magia6->id == $dominio->magia6 ? 'selected' : ''; ?> class="form-control" data-tokens="{{ $magia6->nome }}">{{ $magia6->nome }}</option>                                
                                                @endforeach
                                            </select>

                                            @if($errors->has('magia6'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('magia6') }}</strong>								
                                            </span>
                                            @endif
                                        </div></td>
                                </tr>
                                <tr>
                                    <td>7°</td>
                                    <td><div class="form-group {{ $errors->has('magia7') ? 'has-error' : '' }}" >                                            

                                            <select name="magia7" class="form-control selectpicker" data-live-search="true" value="{{ $dominio->magia7 }}">                                                                                   
                                                @foreach($dominio->magias7() as $magia7)                                                                
                                                <option value="{{$magia7->id}}"  <?php echo $magia7->id == $dominio->magia7 ? 'selected' : ''; ?> class="form-control" data-tokens="{{ $magia7->nome }}">{{ $magia7->nome }}</option>                                
                                                @endforeach
                                            </select>

                                            @if($errors->has('magia7'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('magia7') }}</strong>								
                                            </span>
                                            @endif
                                        </div></td>
                                </tr>
                                <tr>
                                    <td>8°</td>
                                    <td><div class="form-group {{ $errors->has('magia8') ? 'has-error' : '' }}" >                                            

                                            <select name="magia8" class="form-control selectpicker" data-live-search="true" value="{{ $dominio->magia8 }}">                                                                                   
                                                @foreach($dominio->magias8() as $magia8)                                                                
                                                <option value="{{$magia8->id}}"  <?php echo $magia8->id == $dominio->magia8 ? 'selected' : ''; ?> class="form-control" data-tokens="{{ $magia8->nome }}">{{ $magia8->nome }}</option>                                
                                                @endforeach
                                            </select>

                                            @if($errors->has('magia8'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('magia8') }}</strong>								
                                            </span>
                                            @endif
                                        </div></td>
                                </tr>
                                <tr>
                                    <td>9°</td>
                                    <td><div class="form-group {{ $errors->has('magia9') ? 'has-error' : '' }}" >                                            

                                            <select name="magia9" class="form-control selectpicker" data-live-search="true" value="{{ $dominio->magia9 }}">                                                                                   
                                                @foreach($dominio->magias9() as $magia9)                                                                
                                                <option value="{{$magia9->id}}"  <?php echo $magia9->id == $dominio->magia9 ? 'selected' : ''; ?> class="form-control" data-tokens="{{ $magia9->nome }}">{{ $magia9->nome }}</option>                                
                                                @endforeach
                                            </select>

                                            @if($errors->has('magia9'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('magia9') }}</strong>								
                                            </span>
                                            @endif
                                        </div></td>
                                </tr>
                            </tbody>
                        </table>

                        <button class="btn btn-info">Salvar</a>                            
                    </form>
                </div> <!-- panel-body -->
            </div><!-- panel-default -->
        </div><!-- panel col-md-12 -->
    </div>
</div>
@endsection
