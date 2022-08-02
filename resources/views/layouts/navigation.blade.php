<div class="navbar navbar-dark bg-dark d-flex flex-column p-3 text-bg-dark h-100">
    <a href="/" class="d-flex align-items-center justify-content-center mb-3 mb-md-0 mx-auto text-white text-decoration-none">
      <span><i class="bi bi-pc-display-horizontal me-3"></i></span>
      <span class="fs-5">Chamados 0.1</span>
    </a>
    <hr>

    @if(Auth::check() && Auth::user()->admin)
        <ul class="nav nav-pills nav-fill nav-justified flex-column mb-auto d-flex justify-content-center">
          <li class="nav-item">
            <a href="{{ route('users.index') }}" class="nav-link text-white">
              <span><i class="bi bi-people me-2"></i></span>
              <span class="fs-5">Usuários</span>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('service-desk.index') }}" class="nav-link text-white">
              <span><i class="bi bi-ticket me-2"></i></span>
              <span class="fs-5">Chamados</span>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('sectors.index') }}" class="nav-link text-white">
              <span><i class="bi bi-building me-2"></i></span>
              <span class="fs-5">Setores</span>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('tecnicos.index') }}" class="nav-link text-white">
              <span><i class="bi bi-tools me-2"></i></span>
              <span class="fs-5">Técnicos</span>
            </a>
          </li>
        </ul>
    @else
    <ul class="nav nav-pills nav-fill nav-justified flex-column mb-auto d-flex justify-content-center">
      <li class="nav-item">
        <a href="{{ route('usuario.show', Auth::user()->id) }}" class="nav-link text-white" aria-current="page">
          <i class="bi bi-people me-1"></i>
          Meus dados
        </a>
      </li>
      <li class="nav-item">
        <a href="{{ route('service-desk.index') }}" class="nav-link text-white">
          <i class="bi bi-window-stack  me-1"></i>
          Meus chamados
        </a>
      </li>
    </ul>
    @endif
    
</div>