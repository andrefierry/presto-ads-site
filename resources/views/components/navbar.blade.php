<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="{{route('welcome')}}">Home</a>
        </li>

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false" href="#">Categorie</a>
          
          <ul class="dropdown-menu" aria-labelledby="categoriesDropdown">
            @foreach ($categories as $category)
              <li><a class="dropdown-item" href="#">{{($category->name)}}</a></li>
              <li><hr class="dropdown-divider"></li>
            @endforeach
          </ul>
        </li>

        @guest
        <li class="nav-item">
          <a class="nav-link" href="{{route('register')}}">Registrati</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{route('login')}}">Login</a>
        </li>
        @endguest
        @auth
        <li class="nav-item">
          <a class="nav-link" href="">Benvenuto {{Auth::user()->name}}</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{route('article.form-create')}}">Aggiungi l'articolo</a>
        </li>
        <form method="POST" action="{{route('logout')}}">
          @csrf
          <button class="btn nav-link active" type="submit">Logout</button>
        </form>
        @endauth
        <li class="nav-item">
          <a class="nav-link disabled" aria-disabled="true">Disabled</a>
        </li>
      </ul>
    </div>
  </div>
</nav>