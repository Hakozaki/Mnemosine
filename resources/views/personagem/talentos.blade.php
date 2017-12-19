<div class="row" style="padding-top: 10px"> 
    <div class="col-md-6">
        <div class="form-group{{ $errors->has('talento') ? 'has-error' : '' }}" >
            <label for="talento">Talentos:</label>
            <div class="input-group">
                <select id="talento" name="talento" id="talento" class="form-control selectpicker" data-live-search="true" value="">                                   
                    @foreach($personagem->talentos() as $talento)                                                                
                    <option value="{{$talento->id}}" class="form-control" data-tokens="{{ $talento->nome }}">{{ $talento->nome }}</option>                                
                    @endforeach
                </select>
                <span class="input-group-btn"> <a class="btn btn-info" onclick="insereTalento()">Adicionar Talento</a></span>
            </div>
        </div>                                                        

        <table class="table table-bordered" id="tabelaTalentos" name="tabelaTalentos">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nome</th>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                   
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach($personagem->personagemTalentos as $_talento)				
                <tr>
                    <th scope="row">{{ $_talento->id }}</th>
                    <td>{{ $_talento->nome }}</td>                                                                                                                                                                                                                                                                                                                                                                                            
                    <td>                                        
                        <a class="btn btn-danger" href="javascript:confirm('Deletar talento?') ? 
                           window.location.href='{{ route('talento.deletar',$_talento) }}' : false ">Excluir</a>
                    </td>
                </tr>
                @endforeach		
            </tbody>
        </table>
        <div id="divTalentos" name="divTalentos"></div>
    </div><!-- FIM DIV TALENTOS -->
    
    <div class="col-md-6">
        <div class="form-group{{ $errors->has('habEspecial') ? 'has-error' : '' }}" >
            <label for="habEspecial">Habilidade Especial:</label>
            <div class="input-group">
                <select id="habEspecial" name="habEspecial" class="form-control selectpicker" data-live-search="true" value="">                                   
                    @foreach($personagem->talentos() as $talento)                                                                
                    <option value="{{$talento->id}}" class="form-control" data-tokens="{{ $talento->nome }}">{{ $talento->nome }}</option>                                
                    @endforeach
                </select>
                <span class="input-group-btn"> <a class="btn btn-info" onclick="insereTalento()">Adicionar Habilidade</a></span>
            </div>
        </div>                                                        

        <table class="table table-bordered" id="tabelaTalentos" name="tabelaTalentos">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nome</th>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                   
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach($personagem->personagemTalentos as $_talento)				
                <tr>
                    <th scope="row">{{ $_talento->id }}</th>
                    <td>{{ $_talento->nome }}</td>                                                                                                                                                                                                                                                                                                                                                                                            
                    <td>                                        
                        <a class="btn btn-danger" href="javascript:confirm('Deletar talento?') ? 
                           window.location.href='{{ route('talento.deletar',$_talento) }}' : false ">Excluir</a>
                    </td>
                </tr>
                @endforeach		
            </tbody>
        </table>
        <div id="divTalentos" name="divTalentos"></div>
    </div><!-- FIM DIV HAB.ESPECIAL -->
</div>
