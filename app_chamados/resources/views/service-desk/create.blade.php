@extends('layouts.app')

@section('content')
<div class="container mt-3 h-100 justify-content-center">
    <div class="row justify-content-center align-items-center">
        <div class="col-md-6">
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
                    <textarea name="descricao" class="form-control" id="descricao" rows="3"></textarea>
                </div>
                <button type="submit" class="btn btn-primary mt-3">Criar</button>
            </form>

        </div>
    </div>
</div>
@endsection