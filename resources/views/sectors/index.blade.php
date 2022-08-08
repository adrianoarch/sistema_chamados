@extends('layouts.app')

@section('content')

    <div class="container mt-3">
        <div class="row justify-content-center text-secondary">
            <div class="col-md-6 mt-5">

                <div class="row mb-3">
                    <h3 class="text-center">Setores</h3>
                    <span><span class="text-danger">*</span> Clique no nome mais detalhes</span>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <a href="{{ route('sectors.create') }}" class="btn btn-success btn-sm btn-block">
                            <i class="bi bi-plus-circle me-2"></i>
                            Novo setor
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

                <form action="{{ route('sectors.index') }}" method="GET">
                    <div class="input-group mb-3 me-1">
                      <input type="search" class="form-control mb-3" placeholder="Buscar setor" aria-label="Buscar setor" aria-describedby="basic-addon2" name="search">
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
                            <th>Setor</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($sectors as $sector)
                        <tr>
                            <td>{{ $sector->id }}</td>
                            <td><a class="text-decoration-none fw-bold link-light" href="{{ route('sectors.show', $sector->id) }}">{{ $sector->name }}</a></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="row">
                    <div class="col-md-12">
                        {{ $sectors->links('pagination::bootstrap-5') }}
                    </div>
                </div>
                    
@endsection