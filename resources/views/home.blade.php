@extends('layouts.app')
@section('content')
<div class="container h-100 d-flex justify-content-center align-items-center">
    <div class="p-5 mb-5 rounded-3" style="background: var(--bs-gray-700)">
        
        <div class="container-fluid py-5 mb-5">
          <h1 class="display-5 fw-bold text-light mb-2">Bem vindo ao Service Desk</h1>
          <h1 class="text-light fw-bold mb-3"> {{$user->name}}</h1>
          <p class="col-md-8 fs-4 text-light">Acesse o menu ao lado ou clique no botão abaixo para abrir um chamado.</p>
            <a href="{{ route('service-desk.create') }}" class="btn btn-primary btn-lg btn-block fw-bold mt-3">Abrir Chamado</a>
        </div>

      </div>
</div>
@endsection
