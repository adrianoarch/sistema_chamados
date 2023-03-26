@extends('layouts.app')

@section('content')

<div class="container mt-5 d-flex">
    <div class="row d-flex justify-content-center align-items-center text-light w-100">
        <h3 class="text-center text-light">Cadastrar novo usuário</h3>
        <form action="{{ route('users.store') }}" method="post" class="form-group w-100">
            @csrf
            <div class="col-md-6 mb-3 mx-auto">
                <label class="form-label" for="name">Nome Completo</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="Nome" value="{{ old('name') }}">
                @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-md-6 mb-3 mx-auto">
                <label class="form-label" for="login">Login</label>
                <input type="text" class="form-control @error('login') is-invalid @enderror" id="login" name="login" placeholder="Login" value="{{ old('login') }}">
                @error('login')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-md-6 mb-3 mx-auto">
                <label class="form-label" for="email">Email</label>
                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" placeholder="Email" value="{{ old('email') }}">
                @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-md-6 mb-3 mx-auto">
                <label class="form-label" for="password">Senha</label>
                <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" placeholder="Senha">
                @error('password')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-md-6 mb-3 mx-auto">
                <label class="form-label" for="password_confirmation">Confirmar senha</label>
                <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" id="password_confirmation" name="password_confirmation" placeholder="Confirmar senha">
                @error('password_confirmation')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-md-6 mb-3 mx-auto">
                <label class="form-label" for="sector_id">Setor</label>
                <select class="form-control @error('sector_id') is-invalid @enderror" id="sector_id" name="sector_id">
                    @foreach($sectors as $sector)
                        <option value="{{ $sector->id }}" {{ old('sector_id') == $sector->id ? 'selected' : '' }}>{{ $sector->name }}</option>
                    @endforeach
                </select>
                @error('sector_id')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="col-md-6 mt-4 mx-auto">
                <button type="submit" class="btn btn-primary me-2">Cadastrar</button>
                <a href="{{ route('users.index') }}" class="btn btn-secondary">Voltar</a>
            </div>
        </form>
    </div>
</div>



    @endsection