@extends('layouts.app')

@section('content')
    <div class="container mt-3">
        <div class="row justify-content-center text-secondary">
            <div class="col-md-8 mt-5">
                <div class="row">
                    
                    <div class="col-md-6">
                        <a href="{{ route('service-desk.create') }}" class="btn btn-success btn-block">
                            <i class="bi bi-plus-circle me-2"></i>
                            Novo chamado
                        </a>
                    </div>
                </div>

                <div class="row mt-4">
                    <div class="col md-12">
                        @if(Session::has('success'))
                            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                {{ Session::get('success') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <hr>
                        <h3 class="mt-3 text-center text-light">Chamados abertos</h3>
                        <hr>
                        @if(count($chamados) <= 0)
                            <div class="alert alert-info text-center mt-1">
                                Nenhum chamado aberto.
                            </div>
                        @else
                        <table class="table text-light">
                            <thead>
                                <tr>
                                    <th>Número</th>
                                    <th>Título</th>
                                    <th>Status</th>
                                    <th>Ações</th>
                                </tr>
                            </thead>
                            <tbody class="text-light">
                                @foreach ($chamados as $chamado)
                                    <tr>
                                        <td>{{ $chamado->id }}</td>
                                        <td>{{ $chamado->titulo }}</td>
                                        <td>{{ $chamado->status }}</td>
                                        <td>
                                            <a href="{{ route('service-desk.show', $chamado->id) }}" class="btn btn-sm btn-primary">
                                                <i class="bi bi-eye-fill me-1"></i>
                                                Visualizar
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        @endif

                </div>           
            </div>
        </div>
    </div>
@endsection
