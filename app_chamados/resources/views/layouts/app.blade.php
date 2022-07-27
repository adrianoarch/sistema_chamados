<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
</head>

<body class="font-sans vh-100 overflow-y-hidden m-0" style="background: #22272E">

    
    <div class="row h-100 min-vw-100 mx-0 px-0" style="background: #22272E;">
            <div class="row h-auto w-100 mx-0 px-0 d-flex" style="background">
                <div class="col-md-12 bg-dark w-100 mx-0 px-0">
                    {{-- <h1 class="text-secondary text-end me-3">Sistema de Chamados</h1> --}}
                    <nav class="navbar my-auto py-0" style="background: #2980b9">
                        <div class="container-fluid d-flex py-0 my-auto">
                            <div class="navbar-header my-auto py-0">
                                <a class="navbar-brand d-flex" href="{{ route('home.index') }}">
                                    <img src="{{ asset('storage/logo/logo-sudesb.png') }}" alt="logo" class="img-fluid my-0 py-0 ms-3" style="width: 20%">
                                </a>
                            </div>
                            <ul class="nav navbar-nav navbar-right d-flex flex-row text-light">
        
                                <li class="nav-item me-2">
                                    <a class="nav-link text-light fw-bold" href="{{ route('service-desk.index') }}">{{ Auth::user()->name }}</a>
                                </li>
                                <li class="nav-item me-2">
                                    <a class="nav-link text-light fw-bold" href="{{ route('logout') }}" onclick="event.preventDefault(); 
                                    document.getElementById('logout-form').submit();">Sair</a>
                                    <form id="logout-form" action="{{route('logout')}}" method="POST" style="display: none">
                                    @csrf
                                    </form>
                                </li>
                                
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
        

        <div class="row h-100 mx-0 px-0">
            <aside class="col-md-2 px-0">
                @include('layouts.navigation')
            </aside>
        
         <!-- Page Content -->
            <section class="col-md-10">
                @yield('content')   
            </section>
        </div>
    </div>
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous">
    </script>
</body>

</html>
