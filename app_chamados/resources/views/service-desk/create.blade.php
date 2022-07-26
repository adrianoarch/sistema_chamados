@extends('layouts.app')

@section('content')
<div class="container mt-3 h-100 justify-content-center text-secondary">
    <div class="row justify-content-center align-items-center">
        <div class="col-md-12 mt-5">
            <h1>Abertura de chamado</h1>

            <hr>

            <form action="{{ route('service-desk.store') }}" method="POST">
                @csrf
                <div class="form-group mb-2">
                    <label class="form-label" for="titulo">Título</label>
                    <input type="text" name="titulo" class="form-control" id="titulo" placeholder="Título do chamado">
                </div>
                <div class="form-group mb-2">
                    <label for="categoria">Categoria</label>
                    <select name="categoria" id="categoria" class="form-control">
                        <option value="">Selecione uma categoria</option>
                            <option>Impressoras</option>
                            <option>Computadores</option>
                            <option>Outros</option>
                    </select>
                </div>
                <div class="form-group mb-2">
                    <label class="form-label" for="descricao">Descrição</label>
                    <textarea name="descricao" class="form-control" id="descricao" rows="3" placeholder="Descreva brevemente o problema"></textarea>
                </div>
                <div class="form-group mb-2">
                    <label for="ip_address" class="form-label">IP da Máquina</label>
                    <input type="text" name="ip_address" class="form-control" id="ip_address" placeholder="Caso aplique, coloque o endereço IP">
                </div>
                <button type="submit" class="btn btn-primary mt-3">Criar</button>
            </form>

        </div>
    </div>
</div>
@endsection