@extends('layouts.app')

@section('content')
    <div class="container mt-3">
        <div class="row justify-content-center text-secondary">
            <div class="col-md-12 mt-5">
                @if (Auth::check() && Auth::user()->admin)
                    <div class="row">
                        <div class="col-md-3 mb-3">
                            <div class="card bg-primary">
                                <div class="card-body">
                                    <h5 class="card-title text-dark fw-bold">
                                        {{ count($chamadosAbertos->where('status', 'Aberto')) }}</h5>
                                    <p class="card-text text-dark">Chamado(s) aberto(s)</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <div class="card bg-warning">
                                <div class="card-body">
                                    <h5 class="card-title text-dark fw-bold">
                                        {{ count($chamadosEmAtendimento->where('status', 'Em atendimento')) }}</h5>
                                    <p class="card-text text-dark">Chamado(s) em atendimento</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <div class="card bg-success">
                                <div class="card-body">
                                    <h5 class="card-title text-dark fw-bold">
                                        {{ count($chamadosResolvidos->where('status', 'Resolvido')) }}</h5>
                                    <p class="card-text text-dark">Chamado(s) resolvido(s)</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <a href="{{ route('service-desk.closeds') }}" class="streched-link text-decoration-none">
                                <div class="card bg-secondary">
                                    <div class="card-body">
                                        <h5 class="card-title text-dark fw-bold">
                                            {{ count($chamadosFechados->where('status', 'Fechado')) }}</h5>
                                        <p class="card-text text-dark">Chamado(s) fechado(s)</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                @endif

                <div class="row mt-3">
                    <div class="col-md-6">
                        <a href="{{ route('service-desk.create') }}" class="btn btn-success me-2">
                            <i class="bi bi-plus-circle me-2"></i>
                            Novo chamado
                        </a>
                        <a href="{{ route('service-desk.closeds') }}" class="btn btn-secondary">
                            <i class="bi bi-door-closed"></i>
                            Ver chamados fechados
                        </a>
                    </div>
                    <div class="col-md-6">
                        <form action="{{ route('service-desk.index') }}" method="GET" class="form-inline float-right">
                            <div class="input-group">
                                <input type="text" name="search" class="form-control" aria-describedby="button-addon1"
                                    placeholder="Pesquisar chamados...">
                                <button type="submit" class="btn btn-primary" id="button-addon1">
                                    <i class="bi bi-search"></i>
                                </button>
                            </div>
                        </form>
                    </div>
                    
                </div>

                <div class="row mt-4">
                    <div class="col md-12">
                        @if (Session::has('success'))
                            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                {{ Session::get('success') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                        @endif
                    </div>
                </div>

                {{-- <div class="row">
                    <div class="col-md-12">
                        <hr>
                        <h3 class="mt-3 text-center text-primary">Chamados abertos</h3>
                        <hr>
                        @if (count($chamados) <= 0)
                            <div class="alert alert-info text-center mt-1">
                                Nenhum chamado aberto.
                            </div>
                        @else
                            <div class="row">
                                @if ($chamados->where('status', 'Aberto')->count() <= 0)
                                    <div class="alert alert-info text-center mt-1">
                                        Nenhum chamado aberto.
                                    </div>
                                @endif
                                @foreach ($chamados as $chamado)
                                    @if ($chamado->status == 'Aberto')
                                        <div class="col-md-3">
                                            <div class="card mb-3 border-primary" style="min-height: 32rem">
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
                                                    <a href="{{ route('service-desk.show', $chamado->id) }}"
                                                        class="btn btn-primary btn-block">
                                                        <i class="bi bi-eye"></i>

                                                    </a>
                                                    <a href="{{ route('service-desk.edit', $chamado->id) }}"
                                                        class="btn btn-warning btn-block">
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
                                            <div class="card mb-3 border-secondary" style="height: 32rem">
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
                                                    <p class="card-text fw-bold">
                                                        Técnico: {{ $chamado->tecnico->name }}
                                                    </p>
                                                    <p class="card-text">
                                                        <small class="text-muted">
                                                            <i class="bi bi-clock"></i>
                                                            Criado em: {{ $chamado->created_at->format('d/m/Y H:i:s') }}
                                                        </small>
                                                    </p>
                                                    <p class="card-text">
                                                        <small class="text-muted">
                                                            <i class="bi bi-clock"></i>
                                                            Atualização: {{ $chamado->updated_at->format('d/m/Y H:i:s') }}
                                                        </small>
                                                    </p>
                                                </div>
                                                <div class="card-footer">
                                                    <a href="{{ route('service-desk.show', $chamado->id) }}"
                                                        class="btn btn-primary btn-block">
                                                        <i class="bi bi-eye"></i>
                                                    </a>
                                                    <a href="{{ route('service-desk.edit', $chamado->id) }}"
                                                        class="btn btn-warning btn-block">
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
                </div> --}}
                <div class="row">
                    <div class="container">
                        <ul class="nav nav-tabs d-flex justify-content-center" id="chamadosTabs" role="tablist">
                            <li class="nav-item nav-aba-abertos me-1" role="presentation">
                                <a class="nav-link active" id="abertos-tab" data-bs-toggle="tab" href="#abertos"
                                    role="tab" aria-controls="abertos" aria-selected="true">
                                    Chamados Abertos
                                </a>
                            </li>
                            <li class="nav-item me-1" role="presentation">
                                <a class="nav-link" id="atendimento-tab" data-bs-toggle="tab" href="#atendimento"
                                    role="tab" aria-controls="atendimento" aria-selected="false">
                                    Chamados em Atendimento
                                </a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link" id="resolvidos-tab" data-bs-toggle="tab" href="#resolvidos"
                                    role="tab" aria-controls="resolvidos" aria-selected="false">
                                    Chamados Resolvidos
                                </a>
                            </li>
                        </ul>
                        <div class="tab-content mt-1" id="chamadosTabsContent">
                            <div class="tab-pane fade show active" id="abertos" role="tabpanel"
                                aria-labelledby="abertos-tab">
                                @include('service-desk.chamados_table', ['status' => 'Aberto', 'paginatedChamados' => $chamadosAbertos])
                            </div>

                            <div class="tab-pane fade fs-6" id="atendimento" role="tabpanel" aria-labelledby="atendimento-tab">
                                @include('service-desk.chamados_table', ['status' => 'Em atendimento', 'paginatedChamados' => $chamadosEmAtendimento])
                            </div>

                            <div class="tab-pane fade" id="resolvidos" role="tabpanel" aria-labelledby="resolvidos-tab">
                                {{-- Adicione aqui a tabela de chamados resolvidos --}}
                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <style>
        .nav {
            border-color: transparent;
        }

        .nav-tabs .nav-link {
            color: #fff;
            background-color: #343a40;
            border-color: #454d55;
        }

        .nav-tabs .nav-link:hover {
            color: #fff;
            background-color: #454d55;
            border-color: #454d55;
        }

        .nav-tabs .nav-link.active {
            color: #292525;
            background-color: #dadfe4;
            border-color: #454d55 #454d55 #343a40;
        }
    </style>
@endsection
