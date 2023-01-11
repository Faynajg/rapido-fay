<nav class="navbar navbar-expand-lg shadow-sm" id="nav-principal">
  <div class="container-fluid" style="color:white">
    <a class="navbar-brand mx-5" style="color:white " href="#">Rapido.es</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse"  id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active me-3" style="color:white" aria-current="page" href="{{ route('home')  }}">{{__('Home')}}</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active me-3" aria-current="page" style="color:white" href="{{ route('login') }}">{{__('Login')}}</a>
        </li>
        <li class="nav-item">
          <form id="logoutForm" action="{{ route ('logout') }}"  method="POST">
            @csrf
          </form>
          <a id="logoutBtn" class="nav-link me-3" style="color:white"  href="#">{{__('Salir')}}</a>
        </li>
      
        @if  (Auth::user()&& Auth::user()->is_revisor)
        <li class="nav-item">
          <a class="nav-link active me-3" aria-current="page" style="color:white" href="{{ route('revisor.home') }}">{{__('Revisar Anuncios')}}
            <span class="badge rounded-pill bg-danger">
              {{\App\Models\Ad::ToBeRevisionedCount() }}
            </span></a>
        </li>
        @endif
        <li class="nav-item">
          <a class="nav-link active me-3" aria-current="page" style="color:white" href="{{ route('ads.create') }}">{{__('Nuevo anuncio')}}</a>
        </li>
        
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle me-3" style="color:white" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          {{__('Categorias')}}
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            @foreach ($categories as $category)
            <li><a class="dropdown-item" href="{{route('category.ads',$category)}}">{{$category->name}}</a></li>
            @endforeach
          </ul>
        </li>
        <li class="nav-item me-2">
          <x-locale lang="es" country="es" />
        </li>
        <li class="nav-item me-2">
          <x-locale lang="en" country="gb" />
        </li>
        <li class="nav-item me-2">
          <x-locale lang="it" country="it" />
        </li>
      </ul>
      <form class="d-flex">
        <input class="form-control me-3 boton-search" type="search" placeholder="Search" aria-label="Search">
        <button class="boton-violeta me-4 " type="submit">{{__('Search')}}</button>
      </form>
    </div>
  </div>
</nav>

