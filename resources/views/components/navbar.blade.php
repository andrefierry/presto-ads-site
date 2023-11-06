<nav class="navbar navbar-expand-lg">
    <div class="collapse navbar-collapse" id="navbarNav">
      <div class="nav-item">
        <a class="text-decoration-none active ms-5 fs-2 fw-bold text d-flex align-items-center" aria-current="page" href="{{route('welcome')}}"><img class="me-3" src="/images/logo.png" alt="" width="37px" height="37px">Presto.it</a>
      </div>
      <ul class="navbar-nav mx-auto align-items-center">
        <li class="nav-item dropdown mx-4 fw-bold text">
          <a class="text-decoration-none text fs-5 active dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false" href="#">Categorie</a>
          
          <ul class="dropdown-menu" aria-labelledby="categoriesDropdown">
            @foreach ($categories as $category)
              <li><a class="dropdown-item fw-bold text" href="{{route('categoryShow',compact('category'))}}">{{($category->name)}}</a></li>
              <li><hr class="dropdown-divider"></li>
            @endforeach
          </ul>
        </li>

        @guest
        <li class="nav-item">
          <a class="nav-link fs-5 fw-bold text d-flex align-items-center" href="{{route('login')}}">Accedi <i class="bi bi-person-circle fs-4 ms-1"></i></a>
        </li> 
        </ul>
        <div class="nav-item">
          <a class="text-decoration-none fs-5 me-5 text-success d-flex align-items-center" href="{{route('register')}}">Registrati <i class="bi bi-r-circle fs-4 ms-2 text-success"></i></a>
        </div>
        @endguest
        @auth
          <li class="nav-item mx-4">
            <p class="nav-link fs-5 active d-flex align-items-center my-0 text fw-bold" href="">Benvenuto {{Auth::user()->name}}<i class="bi bi-person-fill ms-2 fs-4"></i></p>
          </li>
          <li class="nav-item mx-4">
            <a class="nav-link fs-5 active d-flex align-items-center fw-bold text" href="{{route('article.form-create')}}">Aggiungi l'articolo <i class="bi bi-plus-circle-dotted ms-2 fs-4"></i></a>
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
</nav>