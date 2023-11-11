{{-- <nav class="navbar navbar-expand-lg">
    <div class="collapse navbar-collapse" id="navbarNav">
      <div class="nav-item">
        <a class="text-decoration-none active ms-5 fs-2 fw-bold text d-flex align-items-center" aria-current="page" href="{{route('welcome')}}"><img class="me-3" src="/images/logo.png" alt="" width="37px" height="37px">Presto</a>
      </div>
      <ul class="navbar-nav mx-auto align-items-center">
        <li class="nav-item dropdown mx-4 fw-bold text">
          <a class="text-decoration-none text fs-4 active dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false" href="#">Categorie</a>
          
          <ul class="dropdown-menu" aria-labelledby="categoriesDropdown">
            @foreach ($categories as $category)
              <li><a class="dropdown-item fw-bold text" href="{{route('categoryShow',compact('category'))}}">{{($category->name)}}</a></li>
              <li><hr class="dropdown-divider"></li>
            @endforeach
          </ul>
        </li>
        @guest
        <li class="nav-item">
          <a class="nav-link fs-4 fw-bold text d-flex align-items-center" href="{{route('login')}}">Accedi <i class="bi bi-person-circle fs-4 ms-1"></i></a>
        </li> 
        </ul>
        <div class="nav-item">
          <a class="text-decoration-none fs-4 me-5 text-success d-flex align-items-center" href="{{route('register')}}">Registrati <i class="bi bi-r-circle fs-4 ms-2 text-success"></i></a>
        </div>
        @endguest
        @auth
          @if(Auth::user()->is_revisor)
              <li class="nav-item mx-4">
                <a class="nav-link position-relative text fw-bold fs-4"
                aria-current="page" href="{{route('revisor.index')}}">
                Zona Revisore
                  <span class="position-absolute top-25 h-50 start-100 translate-middle
                  badge rounded-pill bg-danger">
                  {{App\Models\Article::toBeRevisionedCount()}}
                  <span class="visually-hidden"> unread messages </span>
                  </span>
                </a>
              </li>
          @endif
          <li class="nav-item mx-4">
            <p class="nav-link fs-4 active d-flex align-items-center my-0 text fw-bold" href="">Benvenuto {{Auth::user()->name}}<i class="bi bi-person-fill ms-2 fs-4"></i></p>
          </li>
          <li class="nav-item mx-4">
            <a class="nav-link fs-4 active d-flex align-items-center fw-bold text" href="{{route('article.form-create')}}">Aggiungi l'articolo <i class="bi bi-plus-circle-dotted ms-2 fs-4"></i></a>
          </li>
        </ul>
          <div class="">
            <form method="POST" action="{{route('logout')}}">
              @csrf
              <button class="btn text-decoration-none border border-0 fs-4 active me-5 d-flex align-items-center text-danger fw-bold" type="submit">Logout <i class="bi bi-box-arrow-left ms-2 fs-4 text-danger"></i></button>
            </form>
          </div>
        @endauth
    </div>
  </div>
</nav> --}}
<nav class="navbar navbar-expand-lg bg-body-tertiary shadow">
  <div class="container-fluid">
    <div class="nav-item">
      <a class="text-decoration-none active ms-5 fs-3 fw-bold text d-flex align-items-center" aria-current="page" href="{{route('welcome')}}"><img class="me-3" src="/images/logo.png" alt="" width="30px" height="30px">Presto.it</a>
    </div>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarScroll">
      <ul class="navbar-nav my-2 my-lg-0 navbar-nav-scroll ms-auto d-flex align-items-center bg-toggle" style="--bs-scroll-height: 270px;">
        <div class="dropdown mx-3">
          <button class="btn border-0 text fs-6 fw-bold dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
            Lang
          </button>
          <ul class="dropdown-menu rounded">
            <li class="d-flex align-items-center">
              <x-_locale lang='it' nation='it'/><h3>ITA</h3>
            </li>
            <li class="d-flex align-items-center">
              <x-_locale lang='en' nation='gb'/><h3>EN</h3>
            </li>
            <li class="d-flex align-items-center">
              <x-_locale lang='es' nation='es'/><h3>ES</h3>
            </li>
          </ul>
        </div>
        <li class="nav-item dropdown mx-3 fw-bold text d-flex flex-column justify-content-center ">
          <a class="text-decoration-none text fs-6 active dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false" href="#">{{__('ui.categorie')}}</a>
          
          <ul class="dropdown-menu shadow" aria-labelledby="categoriesDropdown">
            @foreach ($categories as $category)
              <li><a class="dropdown-item fw-bold text fs-6" href="{{route('categoryShow',compact('category'))}}">{{__( 'ui.'. $category->name )}}</a></li>
              <li><hr class="dropdown-divider"></li>
            @endforeach
          </ul>
        </li>
        @guest
        <li class="nav-item">
          <a class="nav-link fs-6 fw-bold text d-flex align-items-center mx-3" href="{{route('login')}}">{{__('ui.accedi')}} <i class="bi bi-person-circle fs-6 ms-1"></i></a>
        </li> 
        </ul>
        <div class="nav-item">
          <a class="text-decoration-none fs-6 mx-3 text-success d-flex align-items-center fw-bold" href="{{route('register')}}">{{__('ui.registrati')}} <i class="bi bi-r-circle fs-6 ms-2 text-success"></i></a>
        </div>
        @endguest
        @auth
          @if(Auth::user()->is_revisor)
              <li class="nav-item mx-3">
                <a class="nav-link position-relative text fw-bold fs-6"
                aria-current="page" href="{{route('revisor.index')}}">
                {{__('ui.zonaRevisore')}}
                  <span class="position-absolute top-25 h-50 start-100 translate-middle
                  badge rounded-pill bg-danger">
                  {{App\Models\Article::toBeRevisionedCount()}}
                  <span class="visually-hidden"> unread messages </span>
                  </span>
                </a>
              </li>
          @endif
          <li class="nav-item mx-3">
            <a href="{{route('profile.page')}}" class="text-decoration-none"><p class="nav-link fs-6 active d-flex align-items-center my-0 text fw-bold" href="">{{__('ui.benvenuto')}} {{Auth::user()->name}}<i class="bi bi-person-fill ms-2 fs-6"></i></p></a>
          </li>
          <li class="nav-item mx-3">
            <a class="nav-link fs-6 active d-flex align-items-center fw-bold text" href="{{route('article.form-create')}}">{{__('ui.aggiungiArticoli')}} <i class="bi bi-plus-circle-dotted ms-2 fs-6"></i></a>
          </li>
          <li class="ms-2">
            <form method="POST" action="{{route('logout')}}">
              @csrf
              <button class="btn text-decoration-none border border-0 fs-6 active me-5 d-flex align-items-center text-danger fw-bold" type="submit">Logout <i class="bi bi-box-arrow-left ms-2 fs-6 text-danger"></i></button>
            </form>
          </li>
      </ul>
      @endauth
    </div>
  </div>
</nav>