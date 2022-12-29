<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Fast's</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="{{ route('home')  }}">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="{{ route('login') }}">Login</a>
        </li>
        <li class="nav-item">
          <form id="logoutForm" action="{{ route ('logout') }}"  method="POST">
            @csrf
          </form>
          <a id="logoutBtn" class="nav-link" href="#">Salir</a>
        </li>
      
        @if  (Auth::user()&& Auth::user()->is_revisor)
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="{{ route('revisor.home') }}">Revisar Anuncios 
            <span class="badge rounded-pill bg-danger">
              {{\App\Models\Ad::ToBeRevisionedCount() }}
            </span></a>
        </li>
        @endif
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="{{ route('ads.create') }}">Nuevo Anuncio</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Link</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Categorias
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            @foreach ($categories as $category)
            <li><a class="dropdown-item" href="{{route('category.ads',$category)}}">{{$category->name}}</a></li>
            @endforeach
          </ul>
        </li>
        <li class="nav-item">
          <x-locale lang="en" country="gb" />
        </li>
        <li class="nav-item">
          <x-locale lang="it" country="it" />
        </li>
        <li class="nav-item">
          <x-locale lang="es" country="es" />
        </li>
      </ul>
      <form class="d-flex">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
    </div>
  </div>
</nav>

