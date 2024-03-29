@extends('layouts.app')

@section('content')

    <div class="container mt-5 d-flex">
        <div class="row d-flex justify-content-center align-items-center text-light w-100">
            <h3 class="text-center text-light">Editar usuário</h3>
            <div class="row">
                @if (isset($errors) && count($errors) > 0)
                    <div class="alert alert-danger col-md-8 mx-auto">
                        @foreach ($errors->all() as $error)
                            <p>{{ $error }}</p>
                        @endforeach
                    </div>
                @endif
            </div>
            <form action="{{ route('users.update', $user->id) }}" method="POST" class="form-group w-100">
                @csrf
                @method('PATCH')
                <div class="col-md-6 mb-3 mx-auto">
                    <label class="form-label" for="name">Nome Completo</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Nome"
                        value="{{ $user->name }}">
                </div>
                <div class="col-md-6 mb-3 mx-auto">
                    <label class="form-label" for="login">Login</label>
                    <input type="text" class="form-control" id="login" name="login" placeholder="Login"
                        value="{{ $user->login }}" disabled>
                </div>
                <div class="col-md-6 mb-3 mx-auto">
                    <label class="form-label" for="email">Email</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Email"
                        value="{{ $user->email }}">
                </div>
                <div class="col-md-6 mb-3 mx-auto">
                    <label class="form-label" for="password">Senha</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Senha"
                        value="">
                </div>
                <div class="col-md-6 mb-3 mx-auto">
                    <label class="form-label" for="password_confirmation">Confirmar senha</label>
                    <input type="password" class="form-control" id="password_confirmation" name="password_confirmation"
                        placeholder="Confirmar senha" value="">
                </div>
                <div class="col-md-6 mb-3 mx-auto">
                    <label class="form-label" for="sector_id">Setor</label>
                    <select class="form-control" id="sector_id" name="sector_id">
                        @foreach ($sectors as $sector)
                            <option value="{{ $sector->id }}" {{ $sector->id == $user->sector_id ? 'selected' : '' }}>
                                {{ $sector->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-6 mb-3 mx-auto">
                    <label class="form-label" for="admin">Perfil</label>
                    <select class="form-control" id="admin" name="admin">
                        <option value="0" {{ $user->admin == 0 ? 'selected' : '' }}>Usuário</option>
                        <option value="1" {{ $user->admin == 1 ? 'selected' : '' }}>Administrador</option>
                    </select>
                </div>

                <div class="col-md-6 mt-3 mx-auto">
                    <input type="submit" class="btn btn-primary me-2" value="Atualizar">
                    <a class="btn btn-secondary" href="{{ route('users.index') }}">Voltar</a>
                </div>
            </form>
        @endsection
