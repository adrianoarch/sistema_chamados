@extends('layouts.app')

@section('content')

<div class="container mt-5">
    <div class="row">
        <div class="col-md-6 mx-auto">
            <div class="card rounded" style="background: #22272E;">
                <div class="card-header text-light text-center">
                    <h3 class="card-title">{{ $techician->name }}</h3>
                </div>
                <div class="card-body text-light">
                    <p>Nome do : {{ $techician->name }}</p>
                    <p>Criado em: {{ date('d/m/Y H:i', strtotime($techician->created_at)) }}</p>
                    <p>Última atualização: {{ date('d/m/Y H:i', strtotime($techician->updated_at)) }}</p>
                    <p>Chamados deste técnico:
                        <table class="table table-dark">
                            <thead>
                                <tr>
                                    <th>Título</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($techician->chamados as $chamado)
                                    <tr>
                                        <td>{{ $chamado->titulo }}</td>
                                        <td>{{ $chamado->status }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </p>
                </div>
                <div class="card-footer">
                    <a href="{{ route('tecnicos.index') }}" class="btn btn-primary me-2">Voltar</a>
                    <a href="{{ route('tecnicos.edit', $techician->id) }}" class="btn btn-warning me-2">Editar</a>
                    <form action="{{ route('tecnicos.destroy', $techician->id) }}" method="post" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger me-2">Excluir</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection