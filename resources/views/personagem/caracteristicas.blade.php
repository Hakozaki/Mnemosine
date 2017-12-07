<div class="row" style="padding-top: 10px">
    <div class="form-group col-md-7 {{ $errors->has('nome') ? 'has-error' : '' }}">
        <label for="nome">Nome:</label>
        <input type="text" name="nome" class="form-control" value="{{ $personagem->nome }}" placeholder="Nome">
        @if($errors->has('nome'))
        <span class="help-block">
            <strong>{{ $errors->first('nome') }}</strong>								
        </span>
        @endif
    </div>

    <div class="form-group col-md-5{{ $errors->has('pv') ? 'has-error' : '' }}">
        <label for="pv">P.V:</label>
        <input type="text" name="pv" class="form-control" value="{{ $personagem->pv }}" placeholder="Pontos de vida">
        @if($errors->has('pv'))
        <span class="help-block">
            <strong>{{ $errors->first('pv') }}</strong>								
        </span>
        @endif
    </div>
</div> <!-- NOME PC  -->

<div class="row">
    <div class="form-group col-md-3 {{ $errors->has('idade') ? 'has-error' : '' }}">
        <label for="idade">Idade:</label>
        <input type="text" name="idade" class="form-control" value="{{ $personagem->idade }}" placeholder="Idade">
        @if($errors->has('idade'))
        <span class="help-block">
            <strong>{{ $errors->first('idade') }}</strong>								
        </span>
        @endif
    </div>

    <div class="form-group col-md-3 {{ $errors->has('sexo') ? 'has-error' : '' }}" >
        <label for="sexo">Sexo:</label>

        <select name="sexo" class="form-control selectpicker" data-live-search="true" value="{{ $personagem->sexo }}">                                                                   
            <option value="Masculino"  <?php 'Masculino' == $personagem->sexo ? 'selected' : ''; ?> class="form-control" data-tokens="Masculino">Maculino</option>                                
            <option value="Feminino"  <?php 'Feminino' == $personagem->sexo ? 'selected' : ''; ?> class="form-control" data-tokens="Feminino">Feminino</option>                                
        </select>

        @if($errors->has('sexo'))
        <span class="help-block">
            <strong>{{ $errors->first('sexo') }}</strong>								
        </span>
        @endif
    </div>                                                

    <div class="form-group col-md-3 {{ $errors->has('tendencia') ? 'has-error' : '' }}" >
        <label for="tendencia">Tendência:</label>

        <select name="tendencia" class="form-control selectpicker" data-live-search="true" value="{{ $personagem->tendencia }}">                                   
            @foreach($personagem->tendencias() as $key => $tendencia)                                                                
            <option value="{{$key}}"  <?php echo $key == $personagem->tendencia ? 'selected' : ''; ?> class="form-control" data-tokens="{{ $tendencia }}">{{ $tendencia }}</option>                                
            @endforeach
        </select>

        @if($errors->has('tendencia'))
        <span class="help-block">
            <strong>{{ $errors->first('tendencia') }}</strong>								
        </span>
        @endif
    </div>

    <div class="form-group col-md-3 {{ $errors->has('alinhamento') ? 'has-error' : '' }}" >
        <label for="alinhamento">Alinhamento:</label>

        <select name="alinhamento" class="form-control selectpicker" data-live-search="true" value="{{ $personagem->alinhamento }}">                                   
            @foreach($personagem->alinhamentos() as $key => $alinhamento)                                                                
            <option value="{{$key}}"  <?php echo $key == $personagem->alinhamento ? 'selected' : ''; ?> class="form-control" data-tokens="{{ $alinhamento }}">{{ $alinhamento }}</option>                                
            @endforeach
        </select>

        @if($errors->has('alinhamento'))
        <span class="help-block">
            <strong>{{ $errors->first('alinhamento') }}</strong>								
        </span>
        @endif
    </div>
</div> <!-- IDADE SEXO TENDENCIA ALINHAMENTO -->

<div class="row">
    <div class="form-group col-md-3 {{ $errors->has('raca_id') ? 'has-error' : '' }}" >
        <label for="raca_id">Raça:</label>

        <select name="raca_id" class="form-control selectpicker" data-live-search="true" value="{{ $personagem->raca_id }}">                                   
            @foreach($personagem->racas() as $raca)                                                                
            <option value="{{$raca->id}}"  <?php echo $key == $personagem->raca_id ? 'selected' : ''; ?> class="form-control" data-tokens="{{ $raca->nome }}">{{ $raca->nome }}</option>                                
            @endforeach
        </select>

        @if($errors->has('raca_id'))
        <span class="help-block">
            <strong>{{ $errors->first('raca_id') }}</strong>								
        </span>
        @endif
    </div>

    <div class="form-group col-md-3 {{ $errors->has('altura') ? 'has-error' : '' }}">
        <label for="altura">Altura:</label>
        <input type="text" name="altura" class="form-control" value="{{ $personagem->altura }}" placeholder="Altura do personagem">
        @if($errors->has('altura'))
        <span class="help-block">
            <strong>{{ $errors->first('altura') }}</strong>								
        </span>
        @endif
    </div>

    <div class="form-group col-md-3 {{ $errors->has('peso') ? 'has-error' : '' }}">
        <label for="peso">Peso:</label>
        <input type="text" name="peso" class="form-control" value="{{ $personagem->peso }}" placeholder="Peso do personagem">
        @if($errors->has('peso'))
        <span class="help-block">
            <strong>{{ $errors->first('peso') }}</strong>								
        </span>
        @endif
    </div>

    <div class="form-group col-md-3 {{ $errors->has('tamanho') ? 'has-error' : '' }}" >
        <label for="tamanho">Tamanho</label>
        <select name="tamanho" class="form-control selectpicker" data-live-search="true" value="{{ $personagem->sexo }}">                                                                                                   
            <option value="miudo"  <?php 'miudo' == $personagem->sexo ? 'selected' : ''; ?> class="form-control" data-tokens="miudo">Miúdo</option>                                
            <option value="pequeno"  <?php 'pequeno' == $personagem->sexo ? 'selected' : ''; ?> class="form-control" data-tokens="pequeno">Pequeno</option>                                
            <option value="medio"  <?php 'medio' == $personagem->sexo ? 'selected' : ''; ?> class="form-control" data-tokens="medio">Médio</option>                                
            <option value="grande"  <?php 'grande' == $personagem->sexo ? 'selected' : ''; ?> class="form-control" data-tokens="grande">Grande</option>                                
            <option value="enorme"  <?php 'enorme' == $personagem->sexo ? 'selected' : ''; ?> class="form-control" data-tokens="enorme">Enorme</option>                                
            <option value="imenso"  <?php 'imenso' == $personagem->sexo ? 'selected' : ''; ?> class="form-control" data-tokens="imenso">Imenso</option>                                
        </select>

        @if($errors->has('tamanho'))
        <span class="help-block">
            <strong>{{ $errors->first('tamanho') }}</strong>								
        </span>
        @endif
    </div>    
</div> <!-- RAÇA ALTURA PESO TAMANHO -->
<div class="row">
    <div class="form-group col-md-3 {{ $errors->has('olhos') ? 'has-error' : '' }}">
        <label for="olhos">Olhos:</label>
        <input type="text" name="olhos" class="form-control" value="{{ $personagem->olhos }}" placeholder="Cor dos olhos">
        @if($errors->has('olhos'))
        <span class="help-block">
            <strong>{{ $errors->first('olhos') }}</strong>								
        </span>
        @endif
    </div>

    <div class="form-group col-md-3 {{ $errors->has('cabelo') ? 'has-error' : '' }}">
        <label for="cabelo">Cabelo:</label>
        <input type="text" name="cabelo" class="form-control" value="{{ $personagem->cabelo }}" placeholder="Cor dos cabelos">
        @if($errors->has('cabelo'))
        <span class="help-block">
            <strong>{{ $errors->first('cabelo') }}</strong>								
        </span>
        @endif
    </div>

    <div class="form-group col-md-3 {{ $errors->has('pele') ? 'has-error' : '' }}">
        <label for="pele">Pele:</label>
        <input type="text" name="pele" class="form-control" value="{{ $personagem->pele }}" placeholder="Cor da pele">
        @if($errors->has('pele'))
        <span class="help-block">
            <strong>{{ $errors->first('pele') }}</strong>								
        </span>
        @endif
    </div>

    <div class="form-group col-md-3 {{ $errors->has('divindade_id') ? 'has-error' : '' }}" >
        <label for="divindade_id">Divindade:</label>

        <select name="divindade_id" class="form-control selectpicker" data-live-search="true" value="{{ $personagem->divindade_id }}">                                   
            @foreach($personagem->divindades() as $divindade)                                                                
            <option value="{{$divindade->id}}"  <?php echo $key == $personagem->divindade_id ? 'selected' : ''; ?> class="form-control" data-tokens="{{ $divindade->nome }}">{{ $divindade->nome }}</option>                                
            @endforeach
        </select>

        @if($errors->has('divindade_id'))
        <span class="help-block">
            <strong>{{ $errors->first('divindade_id') }}</strong>								
        </span>
        @endif
    </div>
</div><!-- OLHOS CABELO PELE DIVINDADE -->                                             
<!-- FIM DIVINDADE -->
<div class="form-group {{ $errors->has('observacao') ? 'has-error' : '' }}">
    <label for="observacao">Observação:</label>
    <textarea name="observacao" style="max-width:100%" class="form-control" 
              value="{{ $personagem->observacao }}" placeholder="Observação">{{ $personagem->observacao }}</textarea>
    @if($errors->has('observacao'))
    <span class="help-block">
        <strong>{{ $errors->first('observacao') }}</strong>								
    </span>
    @endif
</div> 

