@extends('layouts.app')

@section('content')

    <div class="col-md-12 text-light mt-5 p-3">
        <div class="row">
            <h1 class="text-start">Chamado n.º {{$chamado->id}}</h1>
        </div>
        
        <div class="row mt-3">
            <div class="col-md-6 mb-3">
                <h3>Título</h3>
                <p>{{$chamado->titulo}}</p>
            </div>
            <div class="col-md-6 mb-3">
                <h3>Categoria</h3>
                <p>{{$chamado->categoria}}</p>
            </div>
            <div class="col-md-6 mb-3">
                <h3>Descrição</h3>
                <p>{{$chamado->descricao}}</p>
            </div>
            <div class="col-md-6 mb-3">
                <h3>Status</h3>
                <p>{{$chamado->status}}</p>
            </div>
            <div class="col-md-6 mb-3">
                <h3>Data de abertura</h3>
                <p>{{$chamado->created_at}}</p>
            </div>
            <div class="col-md-6 mb-3">
                <h3>Data de atualização</h3>
                <p>{{$chamado->updated_at}}</p>
            </div>
            <div class="col-md-6">
                <h3>Técnico</h3>
                @if($chamado->tecnico)
                    <p>{{$chamado->tecnico->name}}</p>
                @else
                    <p>Aguardando técnico</p>
                @endif
            </div>
            <div class="col-md-6">
                <h3>Parecer Técnico</h3>
                <p>{{$chamado->parecer_tecnico}}</p>
            </div>
    </div>

    <div class="row mt-5">
        <button class="text-start">
            <a href="{{route('service-desk.index')}}" class="btn btn-primary">Voltar</a>
        </button>
    </div>
@endsection