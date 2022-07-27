@extends('layouts.app')

@section('content')

<div class="container mt-5">
    <div class="row">
        <div class="col-md-6 mx-auto">
            <div class="card rounded" style="background: #22272E;">
                <div class="card-header text-light text-center">
                    <h3 class="card-title">{{ $sector->name }}</h3>
                </div>
                <div class="card-body text-light">
                    <p>Nome do setor: {{ $sector->name }}</p>
                    <p>Criado em: {{ date('d/m/Y H:i', strtotime($sector->created_at)) }}</p>
                    <p>Última atualização: {{ date('d/m/Y H:i', strtotime($sector->updated_at)) }}</p>
                    <p>Participantes deste setor:
                        <ul>
                            @foreach($sector->users as $user)
                                <li class="mb-2">{{ $user->name }}</li>
                            @endforeach
                        </ul>
                    </p>
                </div>
                <div class="card-footer">
                    <a href="{{ route('sectors.index') }}" class="btn btn-primary me-2">Voltar</a>
                    <a href="{{ route('sectors.edit', $sector->id) }}" class="btn btn-warning me-2">Editar</a>
                    <form action="{{ route('sectors.destroy', $sector->id) }}" method="post" class="d-inline">
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