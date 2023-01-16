<nav class="navbar navbar-expand-lg shadow-sm" id="nav-principal">
  <div class="container-fluid" style="color:white">
    <a class="navbar-brand mx-5" style="color:white " href="#">Fast <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-body-text" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="M0 .5A.5.5 0 0 1 .5 0h4a.5.5 0 0 1 0 1h-4A.5.5 0 0 1 0 .5Zm0 2A.5.5 0 0 1 .5 2h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5Zm9 0a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5Zm-9 2A.5.5 0 0 1 .5 4h3a.5.5 0 0 1 0 1h-3a.5.5 0 0 1-.5-.5Zm5 0a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5Zm7 0a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 0 1h-3a.5.5 0 0 1-.5-.5Zm-12 2A.5.5 0 0 1 .5 6h6a.5.5 0 0 1 0 1h-6a.5.5 0 0 1-.5-.5Zm8 0a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5Zm-8 2A.5.5 0 0 1 .5 8h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5Zm7 0a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5Zm-7 2a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 0 1h-8a.5.5 0 0 1-.5-.5Zm0 2a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4a.5.5 0 0 1-.5-.5Zm0 2a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 0 1h-2a.5.5 0 0 1-.5-.5Z"/>
</svg></a>
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

