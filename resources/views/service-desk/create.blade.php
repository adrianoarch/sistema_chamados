@extends('layouts.app')

@section('content')
<div class="container mt-3 h-100 justify-content-center text-secondary">
    <div class="row justify-content-center align-items-center">
        <div class="col-md-12 mt-5">
            {{-- @if($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif --}}
           
            <h1>Abertura de chamado</h1>

            <hr>

            <form action="{{ route('service-desk.store') }}" method="POST">
                @csrf
                <div class="form-group mb-2">
                    <label class="form-label" for="titulo">Título</label>
                    <input type="text" name="titulo" value="{{ old('titulo') }}" class="form-control @error('titulo') is-invalid @enderror" id="titulo" placeholder="Título do chamado">
                        @error('titulo')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                </div>
                <div class="form-group mb-2">
                    <label for="categoria">Categoria</label>
                    <select name="categoria" id="categoria" class="form-control @error('categoria') is-invalid @enderror">
                        <option value="">Selecione uma categoria</option>                      
                            <option value="Impressoras" {{ old('categoria') == 'Impressoras' ? 'selected' : '' }}>Impressoras</option>
                            <option value="Computadores" {{ old('categoria') == 'Computadores' ? 'selected' : '' }}>Computadores</option>
                            <option value="Outros" {{ old('categoria') == 'Outros' ? 'selected' : '' }}>Outros</option>
                    </select>
                    @error('categoria')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group mb-2">
                    <label class="form-label" for="descricao">Descrição</label>
                    <textarea name="descricao" class="form-control @error('descricao') is-invalid @enderror" id="descricao" rows="3" placeholder="Descreva o problema">@if(old('descricao') != ''){{ old('descricao') }}@endif</textarea>
                        @error('descricao')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                </div>
                <div class="form-group mb-2">
                    <label for="ip_address" class="form-label">IP da Máquina</label>
                    <input type="text" name="ip_address" class="form-control @error('ip_address') is-invalid @enderror" id="ip_address" placeholder="Caso aplique, informe o IP da máquina">
                        @error('ip_address')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                </div>
                <button type="submit" class="btn btn-primary mt-3">Criar</button>
            </form>

        </div>
    </div>
</div>
@endsection