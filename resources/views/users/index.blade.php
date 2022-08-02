@extends('layouts.app')

@section('content')

    <div class="container mt-3">
        <div class="row justify-content-center text-secondary">
            <div class="col-md-8 mt-5">

                <div class="row mb-3">
                    <h3 class="text-center">Usuários registrados</h3>
                    <span><span class="text-danger">*</span> Clique no nome mais detalhes</span>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <a href="{{ route('users.create') }}" class="btn btn-success btn-block">
                            <i class="bi bi-plus-circle me-2"></i>
                            Novo usuário
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

                <form action="{{ route('users.index') }}" method="GET">
                    <div class="input-group mb-3 me-1">
                      <input type="search" class="form-control mb-3" placeholder="Buscar usuário" aria-label="Buscar usuário" aria-describedby="basic-addon2" name="search">
                      <div class="input-group-append">
                        <button class="btn btn-outline-secondary" type="submit">
                          <span class="me-1">
                            <i class="bi bi-search"></i>
                          </span>
                        </button>
                      </div>
                    </div>
                  </form>

<table class="table table-dark table-hover mt-3">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Login</th>
            <th>Email</th>
            <th>Setor</th>
           
        </tr>
    </thead>
    <tbody>
        @foreach($users as $user)
        <tr>
            <td>{{ $user->id }}</td>
            <td><a class="text-decoration-none fw-bold link-light" href="{{ route('users.show', $user->login) }}">{{ $user->name }}</a></td>
            <td>{{$user->login }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ $user->sector->name }}</td>
           
        </tr>
        @endforeach
    </tbody>
</table>

<div class="container my-3">
    <div class="row d-flex justify-content-between align-items-center">
      <div class="col-md-12">
        {{ $users->links('pagination::bootstrap-5') }}
      </div>
    </div>
</div>

@endsection