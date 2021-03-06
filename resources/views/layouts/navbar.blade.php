<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="{{route('dashboard')}}">Distribuidora</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="{{route('presentaciones-index')}}">Productos</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{route('clientes-index')}}">Clientes</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{route('pedidos-index')}}">Pedidos</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{route('marcas-index')}}">Marcas</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{route('productos-index')}}">Tipos de Productos</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{route('formatos-index')}}">Formatos</a>
      </li>
    </ul>

    <form method="POST" action="{{ route ('logout')}}" class="form-inline my-2 my-lg-0">
      @csrf
      <a href="#" class="nav-link px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="user-menu-item-2" onclick="event.preventDefault(); this.closest('form').submit();" >Cerrar sesion</a>
    </form>

  </div>
</nav>
