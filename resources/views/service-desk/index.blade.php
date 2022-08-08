@extends('layouts.app')

@section('content')
    <div class="container mt-3">
        <div class="row justify-content-center text-secondary">
            <div class="col-md-12 mt-5">
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
                        <div class="row">
                            @foreach ($chamados as $chamado)
                                @if ($chamado->status == 'Aberto')
                                    <div class="col-md-3">
                                        <div class="card mb-3">
                                            <div class="card-header text-light bg-primary">
                                                <h5 class="card-title text-center">Chamado nº {{ $chamado->id }}</h5>
                                            </div>
                                            <div class="card-body">
                                                <p class="card-text">
                                                    Título: {{ $chamado->titulo }}
                                                </p>
                                                <p class="card-text">
                                                    <span class="text-secondary">
                                                        <i class="bi bi-person-fill"></i>
                                                    </span>
                                                    Usuário: {{ $chamado->user->name }}
                                                </p>
                                                <p class="card-text">{{ $chamado->descricao }}</p>
                                                <p class="card-text">
                                                    Categoria: {{ $chamado->categoria }}
                                                </p>
                                                <p class="card-text">
                                                    IP: {{ $chamado->ip_address }}
                                                </p>
                                                <p class="card-text">
                                                    <small class="text-muted">
                                                        <i class="bi bi-clock"></i>
                                                        {{ $chamado->created_at->format('d/m/Y H:i:s') }}
                                                    </small>
                                                </p>
                                            </div>
                                            <div class="card-footer">
                                                <a href="{{ route('service-desk.show', $chamado->id) }}" class="btn btn-primary btn-block">
                                                    <i class="bi bi-eye"></i>
                                                    
                                                </a>
                                                <a href="{{ route('service-desk.edit', $chamado->id) }}" class="btn btn-warning btn-block">
                                                    <i class="bi bi-pencil-square"></i>
                                                    
                                                </a>
                                            </div>
                                        </div>
                                    </div>    
                                @endif        
                            @endforeach
                        </div>
                        <div class="row">
                            <hr>
                            <h3 class="mt-3 text-center text-light">Chamados em atendimento</h3>
                            <hr>
                            
                            @if ($chamados->where('status', 'Em atendimento')->count() <= 0)
                                <div class="alert alert-info text-center mt-1">
                                    Nenhum chamado em atendimento.
                                </div>                                   
                            @endif

                            @foreach ($chamados as $chamado)
                                @if ($chamado->status == 'Em atendimento')
                                    <div class="col-md-3">
                                        <div class="card mb-3">
                                            <div class="card-header text-light bg-secondary">
                                                <h5 class="card-title text-center">Chamado nº {{ $chamado->id }}</h5>
                                                <h5 class="card-title">{{ $chamado->titulo }}</h5>
                                            </div>
                                            <div class="card-body">
                                                <p class="card-text">
                                                    <span class="text-secondary">
                                                        <i class="bi bi-person-fill"></i>
                                                    </span>
                                                    Usuário: {{ $chamado->user->name }}
                                                </p>
                                                <p class="card-text">{{ $chamado->descricao }}</p>
                                                <p class="card-text">
                                                    Categoria: {{ $chamado->categoria }}
                                                </p>
                                                <p class="card-text">
                                                    IP: {{ $chamado->ip_address }}
                                                </p>
                                                <p class="card-text">
                                                    <small class="text-muted">
                                                        <i class="bi bi-clock"></i>
                                                        {{ $chamado->created_at->format('d/m/Y H:i:s') }}
                                                    </small>
                                                </p>
                                            </div>
                                            <div class="card-footer">
                                                <a href="{{ route('service-desk.show', $chamado->id) }}" class="btn btn-primary btn-block">
                                                    <i class="bi bi-eye"></i>
                                                </a>
                                                <a href="{{ route('service-desk.edit', $chamado->id) }}" class="btn btn-warning btn-block">
                                                    <i class="bi bi-pencil-square"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>    
                                @endif        
                            @endforeach
                        </div>

                        <div class="row">
                            <hr>
                            <h3 class="mt-3 text-center text-light">Chamados Finalizados</h3>
                            <hr>
                            
                            @if ($chamados->where('status', 'Finalizado')->count() <= 0)
                                <div class="alert alert-info text-center mt-1">
                                    Nenhum chamado finalizado.
                                </div>                                   
                            @endif

                            @foreach ($chamados as $chamado)
                                @if ($chamado->status == 'Finalizado')
                                    <div class="col-md-3">
                                        <div class="card mb-3">
                                            <div class="card-header text-light bg-secondary">
                                                <h5 class="card-title text-center">Chamado nº {{ $chamado->id }}</h5>
                                               
                                            </div>
                                            <div class="card-body">
                                                <p class="card-text">
                                                    <span class="text-secondary">
                                                        <i class="bi bi-person-fill"></i>
                                                    </span>
                                                    Usuário: {{ $chamado->user->name }}
                                                </p>
                                                <p class="card-text">{{ $chamado->descricao }}</p>
                                                <p class="card-text">
                                                    Categoria: {{ $chamado->categoria }}
                                                </p>
                                                <p class="card-text">
                                                    IP: {{ $chamado->ip_address }}
                                                </p>
                                                <p class="card-text">
                                                    <small class="text-muted">
                                                        <i class="bi bi-clock"></i>
                                                        {{ $chamado->created_at->format('d/m/Y H:i:s') }}
                                                    </small>
                                                </p>
                                            </div>
                                            <div class="card-footer">
                                                <a href="{{ route('service-desk.show', $chamado->id) }}" class="btn btn-primary btn-block">
                                                    <i class="bi bi-eye"></i>
                                                </a>
                                                <a href="{{ route('service-desk.edit', $chamado->id) }}" class="btn btn-warning btn-block">
                                                    <i class="bi bi-pencil-square"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>    
                                @endif        
                            @endforeach
                        </div>

                        @endif
                    </div>
                </div>           
            </div>
        </div>
    </div>
@endsection
