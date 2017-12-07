<div class="row" style="padding-top: 10px">
    <div class="form-group col-md-2 {{ $errors->has('ca') ? 'has-error' : '' }}">
        <label for="ca">C.A:</label>
        <input type="text" name="ca" class="form-control" value="{{ $personagem->ca }}" placeholder="Classe de armadura">
        @if($errors->has('ca'))
        <span class="help-block">
            <strong>{{ $errors->first('ca') }}</strong>								
        </span>
        @endif
    </div>

    <div class="form-group col-md-2 {{ $errors->has('armaduraCa') ? 'has-error' : '' }}">
        <label for="armaduraCa">Armadura:</label>
        <input type="text" name="armaduraCa" class="form-control" value="{{ $personagem->armaduraCa }}" placeholder="Bônus de armadura">
        @if($errors->has('armaduraCa'))
        <span class="help-block">
            <strong>{{ $errors->first('armaduraCa') }}</strong>								
        </span>
        @endif
    </div>

    <div class="form-group col-md-2 {{ $errors->has('escudoCa') ? 'has-error' : '' }}">
        <label for="escudoCa">Escudo:</label>
        <input type="text" name="escudoCa" class="form-control" value="{{ $personagem->escudoCa }}" placeholder="Bônus de escudo">
        @if($errors->has('escudoCa'))
        <span class="help-block">
            <strong>{{ $errors->first('escudoCa') }}</strong>								
        </span>
        @endif
    </div>

    <div class="form-group col-md-1 {{ $errors->has('destrezaCa') ? 'has-error' : '' }}">
        <label for="destrezaCa">Destreza:</label>
        <input type="text" name="destrezaCa" class="form-control" value="{{ $personagem->destrezaCa }}" placeholder="Bônus de destreza">
        @if($errors->has('destrezaCa'))
        <span class="help-block">
            <strong>{{ $errors->first('destrezaCa') }}</strong>								
        </span>
        @endif
    </div>

    <div class="form-group col-md-1 {{ $errors->has('tamanhoCa') ? 'has-error' : '' }}">
        <label for="tamanhoCa">Tamanho:</label>
        <input type="text" name="tamanhoCa" class="form-control" value="{{ $personagem->tamanhoCa }}" placeholder="Modificador de tamanho">
        @if($errors->has('tamanhoCa'))
        <span class="help-block">
            <strong>{{ $errors->first('tamanhoCa') }}</strong>								
        </span>
        @endif
    </div>

    <div class="form-group col-md-2 {{ $errors->has('armaduraNaturalCa') ? 'has-error' : '' }}">
        <label for="armaduraNaturalCa">Armadura Natural:</label>
        <input type="text" name="armaduraNaturalCa" class="form-control" value="{{ $personagem->armaduraNaturalCa }}" placeholder="Bônus de armadura natural">
        @if($errors->has('armaduraNaturalCa'))
        <span class="help-block">
            <strong>{{ $errors->first('armaduraNaturalCa') }}</strong>								
        </span>
        @endif
    </div>

    <div class="form-group col-md-1 {{ $errors->has('deflexaoCa') ? 'has-error' : '' }}">
        <label for="deflexaoCa">Deflexão:</label>
        <input type="text" name="deflexaoCa" class="form-control" value="{{ $personagem->deflexaoCa }}" placeholder="Bônus de deflexão natural">
        @if($errors->has('deflexaoCa'))
        <span class="help-block">
            <strong>{{ $errors->first('deflexaoCa') }}</strong>								
        </span>
        @endif
    </div>

    <div class="form-group col-md-1 {{ $errors->has('outrosCa') ? 'has-error' : '' }}">
        <label for="outrosCa">Outros:</label>
        <input type="text" name="outrosCa" class="form-control" value="{{ $personagem->outrosCa }}" placeholder="Outros bônus">
        @if($errors->has('outrosCa'))
        <span class="help-block">
            <strong>{{ $errors->first('outrosCa') }}</strong>								
        </span>
        @endif
    </div>
</div><!-- C.A -->

<div class="row">
    <div class="form-group col-md-4{{ $errors->has('fortitude') ? 'has-error' : '' }}">
        <label for="fortitude">Fortitude:</label>
        <input type="text" name="fortitude" class="form-control" value="{{ $personagem->fortitude }}" placeholder="Fortiturde">
        @if($errors->has('fortitude'))
        <span class="help-block">
            <strong>{{ $errors->first('fortitude') }}</strong>								
        </span>
        @endif
    </div>

    <div class="form-group col-md-2{{ $errors->has('modFortitude') ? 'has-error' : '' }}">
        <label for="modFortitude">Mod.Fortitude:</label>
        <input type="text" name="modFortitude" class="form-control" value="{{ $personagem->modFortitude }}" placeholder="Modificador Fortiturde">
        @if($errors->has('modFortitude'))
        <span class="help-block">
            <strong>{{ $errors->first('modFortitude') }}</strong>								
        </span>
        @endif
    </div>

    <div class="form-group col-md-2{{ $errors->has('habFortitude') ? 'has-error' : '' }}">
        <label for="habFortitude">Hab.Fortitude:</label>
        <input type="text" name="habFortitude" class="form-control" value="{{ $personagem->habFortitude }}" placeholder="Habilidade Fortiturde">
        @if($errors->has('habFortitude'))
        <span class="help-block">
            <strong>{{ $errors->first('habFortitude') }}</strong>								
        </span>
        @endif
    </div>

    <div class="form-group col-md-2{{ $errors->has('magicoFortitude') ? 'has-error' : '' }}">
        <label for="magicoFortitude">Mágico Fortitude:</label>
        <input type="text" name="magicoFortitude" class="form-control" value="{{ $personagem->magicoFortitude }}" placeholder="Mágico Fortiturde">
        @if($errors->has('magicoFortitude'))
        <span class="help-block">
            <strong>{{ $errors->first('magicoFortitude') }}</strong>								
        </span>
        @endif
    </div>

    <div class="form-group col-md-2{{ $errors->has('outrosFortitude') ? 'has-error' : '' }}">
        <label for="outrosFortitude">Outros Fortitude:</label>
        <input type="text" name="outrosFortitude" class="form-control" value="{{ $personagem->outrosFortitude }}" placeholder="Outros Fortiturde">
        @if($errors->has('outrosFortitude'))
        <span class="help-block">
            <strong>{{ $errors->first('outrosFortitude') }}</strong>								
        </span>
        @endif
    </div>
</div> <!-- Fortitude -->

<div class="row">
    <div class="form-group col-md-4 {{ $errors->has('reflexo') ? 'has-error' : '' }}">
        <label for="reflexo">Reflexo:</label>
        <input type="text" name="reflexo" class="form-control" value="{{ $personagem->reflexo }}" placeholder="Reflexo">
        @if($errors->has('reflexo'))
        <span class="help-block">
            <strong>{{ $errors->first('reflexo') }}</strong>								
        </span>
        @endif
    </div>

    <div class="form-group col-md-2 {{ $errors->has('modReflexo') ? 'has-error' : '' }}">
        <label for="modReflexo">Mod.Reflexo:</label>
        <input type="text" name="modReflexo" class="form-control" value="{{ $personagem->modReflexo }}" placeholder="Modificador Reflexo">
        @if($errors->has('modReflexo'))
        <span class="help-block">
            <strong>{{ $errors->first('modReflexo') }}</strong>								
        </span>
        @endif
    </div>

    <div class="form-group col-md-2 {{ $errors->has('habReflexo') ? 'has-error' : '' }}">
        <label for="habReflexo">Hab.Reflexo:</label>
        <input type="text" name="habReflexo" class="form-control" value="{{ $personagem->habReflexo }}" placeholder="Habilidade Reflexo">
        @if($errors->has('habReflexo'))
        <span class="help-block">
            <strong>{{ $errors->first('habReflexo') }}</strong>								
        </span>
        @endif
    </div>

    <div class="form-group col-md-2 {{ $errors->has('magicoReflexo') ? 'has-error' : '' }}">
        <label for="magicoReflexo">Mágico Reflexo:</label>
        <input type="text" name="magicoReflexo" class="form-control" value="{{ $personagem->magicoReflexo }}" placeholder="Mágico Reflexo">
        @if($errors->has('magicoReflexo'))
        <span class="help-block">
            <strong>{{ $errors->first('magicoReflexo') }}</strong>								
        </span>
        @endif
    </div>

    <div class="form-group col-md-2 {{ $errors->has('outrosReflexo') ? 'has-error' : '' }}">
        <label for="outrosReflexo">Outros Reflexo:</label>
        <input type="text" name="outrosReflexo" class="form-control" value="{{ $personagem->outrosReflexo }}" placeholder="Outros Reflexo">
        @if($errors->has('outrosReflexo'))
        <span class="help-block">
            <strong>{{ $errors->first('outrosReflexo') }}</strong>								
        </span>
        @endif
    </div>
</div> <!-- Reflexo -->

<div class="row">
    <div class="form-group col-md-4 {{ $errors->has('vontade') ? 'has-error' : '' }}">
        <label for="vontade">Vontade:</label>
        <input type="text" name="vontade" class="form-control" value="{{ $personagem->vontade }}" placeholder="Vontade">
        @if($errors->has('vontade'))
        <span class="help-block">
            <strong>{{ $errors->first('vontade') }}</strong>								
        </span>
        @endif
    </div>
    <div class="form-group col-md-2 {{ $errors->has('modVontade') ? 'has-error' : '' }}">
        <label for="modVontade">Mod.Vontade:</label>
        <input type="text" name="modVontade" class="form-control" value="{{ $personagem->modVontade }}" placeholder="Modificador Vontade">
        @if($errors->has('modVontade'))
        <span class="help-block">
            <strong>{{ $errors->first('modVontade') }}</strong>								
        </span>
        @endif
    </div>
    <div class="form-group col-md-2 {{ $errors->has('habVontade') ? 'has-error' : '' }}">
        <label for="habVontade">Hab.Vontade:</label>
        <input type="text" name="habVontade" class="form-control" value="{{ $personagem->habVontade }}" placeholder="Habilidade Vontade">
        @if($errors->has('habVontade'))
        <span class="help-block">
            <strong>{{ $errors->first('habVontade') }}</strong>								
        </span>
        @endif
    </div>

    <div class="form-group col-md-2 {{ $errors->has('magicoVontade') ? 'has-error' : '' }}">
        <label for="magicoVontade">Mágico Vontade:</label>
        <input type="text" name="magicoVontade" class="form-control" value="{{ $personagem->magicoVontade }}" placeholder="Mágico Vontade">
        @if($errors->has('magicoVontade'))
        <span class="help-block">
            <strong>{{ $errors->first('magicoVontade') }}</strong>								
        </span>
        @endif
    </div>

    <div class="form-group col-md-2 {{ $errors->has('outrosVontade') ? 'has-error' : '' }}">
        <label for="outrosVontade">Outros Vontade:</label>
        <input type="text" name="outrosVontade" class="form-control" value="{{ $personagem->outrosVontade }}" placeholder="Outros Vontade">
        @if($errors->has('outrosVontade'))
        <span class="help-block">
            <strong>{{ $errors->first('outrosVontade') }}</strong>								
        </span>
        @endif
    </div>
</div><!-- Vontade -->

<div class="row">
    <div class="form-group col-md-4 {{ $errors->has('agarrar') ? 'has-error' : '' }}">
        <label for="agarrar">Agarrar:</label>
        <input type="text" name="agarrar" class="form-control" value="{{ $personagem->agarrar }}" placeholder="Bônus agarrar">
        @if($errors->has('agarrar'))
        <span class="help-block">
            <strong>{{ $errors->first('agarrar') }}</strong>								
        </span>
        @endif
    </div>

    <div class="form-group col-md-2 {{ $errors->has('modAgarrar') ? 'has-error' : '' }}">
        <label for="modAgarrar">Mod.Agarrar:</label>
        <input type="text" name="modAgarrar" class="form-control" value="{{ $personagem->modAgarrar }}" placeholder="Modificador agarrar">
        @if($errors->has('modAgarrar'))
        <span class="help-block">
            <strong>{{ $errors->first('modAgarrar') }}</strong>								
        </span>
        @endif
    </div>

    <div class="form-group col-md-2 {{ $errors->has('forcaAgarrar') ? 'has-error' : '' }}">
        <label for="forcaAgarrar">Força:</label>
        <input type="text" name="forcaAgarrar" class="form-control" value="{{ $personagem->forcaAgarrar }}" placeholder="Modificador força agarrar">
        @if($errors->has('forcaAgarrar'))
        <span class="help-block">
            <strong>{{ $errors->first('forcaAgarrar') }}</strong>								
        </span>
        @endif
    </div>

    <div class="form-group col-md-2 {{ $errors->has('tamanhoAgarrar') ? 'has-error' : '' }}">
        <label for="tamanhoAgarrar">Tamanho:</label>
        <input type="text" name="tamanhoAgarrar" class="form-control" value="{{ $personagem->tamanhoAgarrar }}" placeholder="Modificador tamanho agarrar">
        @if($errors->has('tamanhoAgarrar'))
        <span class="help-block">
            <strong>{{ $errors->first('tamanhoAgarrar') }}</strong>								
        </span>
        @endif
    </div>

    <div class="form-group col-md-2 {{ $errors->has('outrosAgarrar') ? 'has-error' : '' }}">
        <label for="outrosAgarrar">Outros:</label>
        <input type="text" name="outrosAgarrar" class="form-control" value="{{ $personagem->outrosAgarrar }}" placeholder="Modificador outros agarrar">
        @if($errors->has('outrosAgarrar'))
        <span class="help-block">
            <strong>{{ $errors->first('outrosAgarrar') }}</strong>								
        </span>
        @endif
    </div>
</div><!-- AGUARRAR -->