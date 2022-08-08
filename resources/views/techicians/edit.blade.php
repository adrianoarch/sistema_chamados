@extends('layouts.app')

@section('content')


<div class="container mt-5 d-flex">
    <div class="row d-flex justify-content-center align-items-center text-light w-100">
        <h3 class="text-center text-light">Editar Técnico</h3>
        <form action="{{ route('tecnicos.update', $techician->id) }}" method="post" class="form-group w-100">
            @csrf
            <div class="col-md-6 mb-3 mx-auto">
                <label class="form-label" for="name">Nome</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Nome" value="{{ $techician->name }}">
            </div>
            <div class="col-md-6 mb-3 mx-auto">
                <button type="submit" class="btn btn-primary btn-block">Atualizar</button>
            </div>
        </form>
    </div>
</div>
@endsection