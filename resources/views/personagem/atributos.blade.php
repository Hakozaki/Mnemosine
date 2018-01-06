<div class="row"style=" padding-top: 10px">
    <div class="row col-md-6">
        <div class="form-group col-md-6 {{ $errors->has('forca') ? 'has-error' : '' }}">
            <label for="forca">Força:</label>
            <input type="text" name="forca" class="form-control" value="{{ $personagem->forca }}" placeholder="Força">
            @if($errors->has('forca'))
            <span class="help-block">
                <strong>{{ $errors->first('forca') }}</strong>								
            </span>
            @endif
        </div>

        <div class="form-group col-md-6 {{ $errors->has('modForca') ? 'has-error' : '' }}">
            <label for="modForca">Mod.Força:</label>
            <input type="text" name="modForca" class="form-control" value="{{ $personagem->modForca }}" placeholder="Modificador de Força">
            @if($errors->has('modForca'))
            <span class="help-block">
                <strong>{{ $errors->first('modForca') }}</strong>								
            </span>
            @endif
        </div>

        <div class="form-group col-md-6 {{ $errors->has('destreza') ? 'has-error' : '' }}">
            <label for="destreza">Destreza:</label>
            <input type="text" name="destreza" class="form-control" value="{{ $personagem->destreza }}" placeholder="Destreza">
            @if($errors->has('destreza'))
            <span class="help-block">
                <strong>{{ $errors->first('destreza') }}</strong>								
            </span>
            @endif
        </div>

        <div class="form-group col-md-6 {{ $errors->has('modDestreza') ? 'has-error' : '' }}">
            <label for="modDestreza">Mod.Destreza:</label>
            <input type="text" name="modDestreza" class="form-control" value="{{ $personagem->modDestreza }}" placeholder="Modificador de Destreza">
            @if($errors->has('modDestreza'))
            <span class="help-block">
                <strong>{{ $errors->first('modDestreza') }}</strong>								
            </span>
            @endif
        </div>

        <div class="form-group col-md-6 {{ $errors->has('constituicao') ? 'has-error' : '' }}">
            <label for="constituicao">Constituição:</label>
            <input type="text" name="constituicao" class="form-control" value="{{ $personagem->constituicao }}" placeholder="Constituição">
            @if($errors->has('constituicao'))
            <span class="help-block">
                <strong>{{ $errors->first('constituicao') }}</strong>								
            </span>
            @endif
        </div>

        <div class="form-group col-md-6 {{ $errors->has('modConstituicao') ? 'has-error' : '' }}">
            <label for="modConstituicao">Mod.Constituição:</label>
            <input type="text" name="modConstituicao" class="form-control" value="{{ $personagem->modConstituicao }}" placeholder="Modificador de Constituição">
            @if($errors->has('modConstituicao'))
            <span class="help-block">
                <strong>{{ $errors->first('modConstituicao') }}</strong>								
            </span>
            @endif
        </div>

        <div class="form-group col-md-6 {{ $errors->has('inteligencia') ? 'has-error' : '' }}">
            <label for="inteligencia">Inteligência:</label>
            <input type="text" name="inteligencia" class="form-control" value="{{ $personagem->inteligencia }}" placeholder="Inteligência">
            @if($errors->has('inteligencia'))
            <span class="help-block">
                <strong>{{ $errors->first('inteligencia') }}</strong>								
            </span>
            @endif
        </div>

        <div class="form-group col-md-6 {{ $errors->has('modInteligencia') ? 'has-error' : '' }}">
            <label for="modInteligencia">Mod.Inteligência:</label>
            <input type="text" name="modInteligencia" class="form-control" value="{{ $personagem->modInteligencia }}" placeholder="Modificador de Inteligência">
            @if($errors->has('modInteligencia'))
            <span class="help-block">
                <strong>{{ $errors->first('modInteligencia') }}</strong>								
            </span>
            @endif
        </div>

        <div class="form-group col-md-6 {{ $errors->has('sabedoria') ? 'has-error' : '' }}">
            <label for="sabedoria">Sabedoria:</label>
            <input type="text" name="sabedoria" class="form-control" value="{{ $personagem->sabedoria }}" placeholder="Sabedoria">
            @if($errors->has('sabedoria'))
            <span class="help-block">
                <strong>{{ $errors->first('sabedoria') }}</strong>								
            </span>
            @endif
        </div>

        <div class="form-group col-md-6 {{ $errors->has('modSabedoria') ? 'has-error' : '' }}">
            <label for="modSabedoria">Mod.Sabedoria:</label>
            <input type="text" name="modSabedoria" class="form-control" value="{{ $personagem->modSabedoria }}" placeholder="Modificador de Sabedoria">
            @if($errors->has('modSabedoria'))
            <span class="help-block">
                <strong>{{ $errors->first('modSabedoria') }}</strong>								
            </span>
            @endif
        </div>

        <div class="form-group col-md-6 {{ $errors->has('carisma') ? 'has-error' : '' }}">
            <label for="carisma">Carisma:</label>
            <input type="text" name="carisma" class="form-control" value="{{ $personagem->carisma }}" placeholder="Carisma">
            @if($errors->has('carisma'))
            <span class="help-block">
                <strong>{{ $errors->first('carisma') }}</strong>								
            </span>
            @endif
        </div>

        <div class="form-group col-md-6 {{ $errors->has('modCarisma') ? 'has-error' : '' }}">
            <label for="modCarisma">Mod.Carisma:</label>
            <input type="text" name="modCarisma" class="form-control" value="{{ $personagem->modCarisma }}" placeholder="Modificador de Carisma">
            @if($errors->has('modCarisma'))
            <span class="help-block">
                <strong>{{ $errors->first('modCarisma') }}</strong>								
            </span>
            @endif
        </div>
    </div> <!-- LADO ESQUERDO (ATRIBUTOS) -->

    <div class="row col-md-6">
        <div class="form-group col-md-4 {{ $errors->has('iniciativa') ? 'has-error' : '' }}">
            <label for="iniciativa">Iniciativa:</label>
            <input type="text" name="iniciativa" class="form-control" value="{{ $personagem->iniciativa }}" placeholder="Bônus de iniciativa">
            @if($errors->has('iniciativa'))
            <span class="help-block">
                <strong>{{ $errors->first('iniciativa') }}</strong>								
            </span>
            @endif
        </div>
        <div class="form-group col-md-4 {{ $errors->has('modDestrezaIniciativa') ? 'has-error' : '' }}">
            <label for="modDestrezaIniciativa">Mod.Destreza:</label>
            <input type="text" name="modDestrezaIniciativa" class="form-control" value="{{ $personagem->modDestrezaIniciativa }}" placeholder="Modificador Destreza">
            @if($errors->has('modDestrezaIniciativa'))
            <span class="help-block">
                <strong>{{ $errors->first('modDestrezaIniciativa') }}</strong>								
            </span>
            @endif
        </div>
        <div class="form-group col-md-4 {{ $errors->has('outrosIniciativa') ? 'has-error' : '' }}">
            <label for="outrosIniciativa">Outros:</label>
            <input type="text" name="outrosIniciativa" class="form-control" value="{{ $personagem->outrosIniciativa }}" placeholder="Outros">
            @if($errors->has('outrosIniciativa'))
            <span class="help-block">
                <strong>{{ $errors->first('outrosIniciativa') }}</strong>								
            </span>
            @endif
        </div>
       
        <div class="form-group col-md-12 {{ $errors->has('bba') ? 'has-error' : '' }}">
            <label for="bba">B.B.A:</label>
            <input type="text" name="bba" class="form-control" value="{{ $personagem->bba }}" placeholder="Bônus base de ataque">
            @if($errors->has('bba'))
            <span class="help-block">
                <strong>{{ $errors->first('bba') }}</strong>								
            </span>
            @endif
        </div>
        <div class="form-group col-md-6 {{ $errors->has('reducaoDano') ? 'has-error' : '' }}">
            <label for="reducaoDano">Redução de dano:</label>
            <input type="text" name="reducaoDano" class="form-control" value="{{ $personagem->reducaoDano }}" placeholder="Redução de dano">
            @if($errors->has('reducaoDano'))
            <span class="help-block">
                <strong>{{ $errors->first('reducaoDano') }}</strong>								
            </span>
            @endif
        </div>

        <div class="form-group col-md-6 {{ $errors->has('resistenciaMagica') ? 'has-error' : '' }}">
            <label for="resistenciaMagica">Resistência mágica:</label>
            <input type="text" name="resistenciaMagica" class="form-control" value="{{ $personagem->resistenciaMagica }}" placeholder="Resistência mágica">
            @if($errors->has('resistenciaMagica'))
            <span class="help-block">
                <strong>{{ $errors->first('resistenciaMagica') }}</strong>								
            </span>
            @endif
        </div>

        <div class="form-group col-md-12 {{ $errors->has('deslocamento') ? 'has-error' : '' }}">
            <label for="deslocamento">Deslocamento:</label>
            <div class="input-group">
                <input type="text" name="deslocamento" class="form-control" value="{{ $personagem->deslocamento }}" placeholder="Deslocamento">
                <span class="input-group-addon">M</span>
            </div>
            @if($errors->has('deslocamento'))
            <span class="help-block">
                <strong>{{ $errors->first('deslocamento') }}</strong>								
            </span>
            @endif
        </div>                                                                                           

    </div><!-- LADO DIREITO -->
</div><!-- ESQUERDO(ATRIBUTOS) DIREITO(...)--> 