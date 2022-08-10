@extends('layouts.app')

@section('content')

    <div class="container mt-3">
        <div class="row justify-content-center text-secondary">
            <div class="col-md-12 mt-5">
                <h3 class="text-center">Chamados fechados</h3>
                <hr>
                <table class="table table-dark table-striped table-hover">
                    <thead>
                        <tr>
                            <th>Título</th>
                            <th>Status</th>
                            <th>Categoria</th>
                            <th>Técnico</th>
                            <th>Aberto por</th>
                            <th>Data de abertura</th>
                            <th>Data de fechamento</th>
                            <th>Ver detalhes</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($chamados as $chamado)
                            <tr>
                                <td>{{ $chamado->titulo }}</td>
                                <td>{{ $chamado->status }}</td>
                                <td>{{ $chamado->categoria }}</td>
                                <td>{{ $chamado->tecnico->name }}</td>
                                <td>{{ $chamado->user->name }}</td>
                                <td>{{ $chamado->created_at }}</td>
                                <td>{{ $chamado->updated_at }}</td>
                                <td><a href="{{ route('service-desk.show', $chamado->id) }}" class="btn btn-sm btn-primary">Ver detalhes</a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>


            </div>
        </div>
    </div>
@endsection