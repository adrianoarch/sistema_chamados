@extends('layouts.app')

@section('content')
    <div class="container mt-3">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h1 class="mt-3 text-center">Meus chamados</h1>
                <hr>
                <div class="row">
                    
                    <div class="col-md-6">
                        <a href="{{ route('service-desk.create') }}" class="btn btn-primary btn-block">
                            <i class="bi bi-plus-circle me-2"></i>
                            Novo chamado
                        </a>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <hr>
                        <h3 class="mt-3 text-center">Chamados abertos</h3>
                        <hr>
                        <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>Número</th>
                                    <th>Título</th>
                                    <th>Status</th>
                                    <th>Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($chamados as $chamado)
                                    <tr>
                                        <td>{{ $chamado->id }}</td>
                                        <td>{{ $chamado->titulo }}</td>
                                        <td>{{ $chamado->status }}</td>
                                        <td>
                                            <a href="{{ route('service-desk.show', $chamado->id) }}" class="btn btn-sm btn-primary">
                                                <i class="material-icons-outlined">visibility</i>
                                                Visualizar
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                </div>           
            </div>
        </div>
    </div>
@endsection
