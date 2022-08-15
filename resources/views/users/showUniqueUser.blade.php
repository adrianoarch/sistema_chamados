@extends('layouts.app')

@section('content')

<div class="container mt-5">
    <div class="row">
        <div class="col-md-8 mx-auto">
            <div class="card rounded" style="background: #22272E;">
                <div class="card-header text-light text-center">
                    <h3 class="card-title">{{ $user->name }}</h3>
                </div>
                <div class="card-body text-light">
                    <p>Login: {{ $user->login }}</p>
                    <p>Email: {{ $user->email }}</p>
                    <p>Setor: {{ $user->sector->name }}</p>
                    <p>Criado em: {{ date('d/m/Y H:i', strtotime($user->created_at)) }}</p>
                    <p>Última atualização: {{ date('d/m/Y H:i', strtotime($user->updated_at)) }}</p>
                </div>
                <div class="card-footer">
                    <a href="{{ route('users.index') }}" class="btn btn-primary me-2">Voltar</a>
                    {{-- <a href="{{ route('users.edit', $user->id) }}" class="btn btn-warning me-2">Editar</a> --}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection