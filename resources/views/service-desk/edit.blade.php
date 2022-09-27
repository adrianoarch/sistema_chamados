@extends('layouts.app')

@section('content')

    <div class="container mt-3 h-100 justify-content-center text-secondary">
        <div class="row align-items-center">
            <h1 class="text-center text-light">Atendimento do chamado {{ $chamado->id }}</h1>
            @if ($errors->any())
                <div class="col-md-11">
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>* {{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            @endif
            <div class="col-md-6 mt-3">
                <h3>Aberto por: {{ $chamado->user->name }}</h3>
                <hr>
            </div>
            <div class="col-md-6 mb-2">
                <h3 class="text-center text-warning">Opções para o técnico:</h3>
            </div>
            
            <div class="col-md-6 mb-2">
                <form class="form-group" action="{{ route('service-desk.update', $chamado->id) }}" method="POST">
                    @csrf
                    @method('POST')
                    <label class="form-label" for="titulo">Título</label>
                    <input type="text" name="titulo" class="form-control" id="titulo" value="{{ $chamado->titulo }}" placeholder="Título do chamado">
            </div>
                    <div class="col-md-4 mb-2 mx-auto">
                        <label class="form-label" for="status">Status</label>
                        <select name="status" id="status" class="form-control">
                            @if($chamado->status)
                                <option value="{{ $chamado->status }}">{{ $chamado->status }}</option>
                            @else
                            <option value="">Selecione um status</option>
                            @endif
                            <option value="Aberto" {{ old('status') == 'Aberto' ? 'selected' : '' }}>Aberto</option>
                            <option value="Em atendimento" {{ old('status') == 'Em atendimento' ? 'selected' : '' }}>Em atendimento</option>
                            <option value="Resolvido" {{ old('status') == 'Resolvido' ? 'selected' : '' }}>Resolvido</option>
                            <option value="Fechado" {{ old('status') == 'Fechado' ? 'selected' : '' }}>Fechado</option>
                        </select>
                    </div>
                     
                    <div class="col-md-6 mb-2">
                        <label class="form-label" for="categoria">Categoria</label>
                        <select name="categoria" id="categoria" class="form-control">
                            <option value="Impressoras" {{ $chamado->categoria == 'Impressoras' ? 'selected' : '' }}>Impressoras</option>
                            <option value="Computadores" {{ $chamado->categoria == 'Computadores' ? 'selected' : '' }}>Computadores</option>
                            <option value="Outros" {{ $chamado->categoria == 'Outros' ? 'selected' : '' }}>Outros</option>
                        </select>
                    </div>

                    <div class="col-md-4 mb-2 mx-auto">
                        <label class="form-label" for="tecnico_id">Técnico</label>
                        <select name="tecnico_id" id="tecnico_id" class="form-control" required>
                            @if ($chamado->tecnico)
                                <option value="{{ $chamado->tecnico->id }}">{{ $chamado->tecnico->name }}</option>
                            @else
                                <option value="">Nenhum técnico atribuído</option>                               
                            @endif
                            @foreach($tecnicos as $tecnico)
                                <option value="{{ $tecnico->id }}" {{ old('tecnico_id') == $tecnico->id ? 'selected' : '' }}>{{ $tecnico->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    
                    <div class="col-md-6 mb-2">
                        <label class="form-label" for="descricao">Descrição</label>
                        <textarea name="descricao" class="form-control" id="descricao" rows="3" placeholder="Descreva brevemente o problema" required>{{ $chamado->descricao }}</textarea>
                    </div>

                    <div class="col-md-4 mb-2 mx-auto">
                        <label class="form-label" for="parecer_tecnico">Parecer técnico atual</label>
                        <textarea rows="3" name="parecer_tecnico" class="form-control" id="parecer_tecnico" placeholder="Digite o status atual do atendimento e/ou a solução do problema">{{ old('parecer_tecnico') }}</textarea>
                    </div>

                    <div class="col-md-4 mb-2">
                        <label class="form-label" for="ip_address" class="form-label">IP da Máquina</label>
                        <input type="text" name="ip_address" class="form-control" id="ip_address" value="{{ $chamado->ip_address }}
                        " placeholder="Caso aplique, coloque o endereço IP">
                    </div>
                    <hr>
                

                    <button type="submit" class="btn btn-primary btn-sm mt-3 col-md-2">Atualizar</button>
                </form>
            </div>
        </div>
    </div>

@endsection

{{-- <h4>Opções para o técnico:</h4>
                    <div class="form-group mb-2">
                        <label class="form-label" for="status">Status</label>
                        <select name="status" id="status" class="form-control">
                            <option value="">Selecione um status</option>
                            <option value="Aberto" {{ $chamado->status == 'Aberto' ? 'selected' : '' }}>Aberto</option>
                            <option value="Em andamento" {{ $chamado->status == 'Em andamento' ? 'selected' : '' }}>Em andamento</option>
                            <option value="Resolvido" {{ $chamado->status == 'Resolvido' ? 'selected' : '' }}>Resolvido</option>
                            <option value="Fechado" {{ $chamado->status == 'Fechado' ? 'selected' : '' }}>Fechado</option>
                        </select>
                    </div>
                    <div class="form-group mb-2">
                        <label class="form-label" for="tecnico">Técnico</label>
                        <select name="tecnico" id="tecnico" class="form-control">
                            <option value="">Selecione um técnico</option>
                            @foreach($tecnicos as $tecnico)
                                <option value="{{ $tecnico->id }}" {{ $chamado->tecnico_id == $tecnico->id ? 'selected' : '' }}>{{ $tecnico->name }}</option>
                            @endforeach
                        </select>
                    </div> --}}