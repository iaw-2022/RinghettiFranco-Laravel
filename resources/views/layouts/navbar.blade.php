<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">Distribuidora</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="{{route('dashboard')}}">Inicio<span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{route('presentaciones-index')}}">Productos</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{route('clientes-index')}}">Clientes</a>
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
  </div>
</nav>
