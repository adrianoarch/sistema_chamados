<div class=" navbar navbar-dark bg-dark d-flex flex-column flex-shrink-0 p-3 text-bg-dark min-vh-100">
    <a href="/" class="d-flex align-items-center justify-content-center mb-3 mb-md-0 mx-auto text-white text-decoration-none">
      <span><i class="bi bi-pc-display-horizontal me-3"></i></span>
      <span class="fs-4">Chamados 0.1</span>
    </a>
    <hr>
    <ul class="nav nav-pills nav-fill nav-justified flex-column mb-auto d-flex justify-content-center">
      <li class="nav-item">
        <a href="#" class="nav-link text-white" aria-current="page">
          <span class="me-2"><i class="bi bi-person"></i></span>
          Meus dados
        </a>
      </li>
      <li class="nav-item">
        <a href="{{ route('service-desk.index') }}" class="nav-link text-white">
          <span class="material-symbols-outlined">
            sos
            </span>
          Meus chamados
        </a>
      </li>
      <li class="nav-item">
        <a href="#" class="nav-link hover:bg-sky-700 text-white">
          <svg class="bi pe-none me-2" width="16" height="16"><use xlink:href="#table"></use></svg>
          Orders
        </a>
      </li>
      <li>
        <a href="#" class="nav-link text-white">
          <svg class="bi pe-none me-2" width="16" height="16"><use xlink:href="#grid"></use></svg>
          Products
        </a>
      </li>
      <li>
        <a href="#" class="nav-link text-white">
          <svg class="bi pe-none me-2" width="16" height="16"><use xlink:href="#people-circle"></use></svg>
          Customers
        </a>
      </li>
    </ul>
    <hr>
    <div class="dropdown">
      <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
        <img src="https://github.com/mdo.png" alt="" width="32" height="32" class="rounded-circle me-2">
        <strong>mdo</strong>
      </a>
      <ul class="dropdown-menu dropdown-menu-dark text-small shadow">
        <li><a class="dropdown-item" href="#">New project...</a></li>
        <li><a class="dropdown-item" href="#">Settings</a></li>
        <li><a class="dropdown-item" href="#">Profile</a></li>
        <li><hr class="dropdown-divider"></li>
        <li><a class="dropdown-item" href="#">Sign out</a></li>
      </ul>
    </div>
</div>