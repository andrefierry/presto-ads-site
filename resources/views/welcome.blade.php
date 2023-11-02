<x-layout>
    <div class="container">
        <h1 class="text-center my-5">Presto.it</h1>
        <div class="row justify-content-center">
                @foreach ($articles as $key => $article )
                <div class="col-12 col-md-4 d-flex justify-content-center my-4">
                    <div class="card shadow" style="width: 18rem;">
                        <img src="https://picsum.photos/20{{$key}}" class="card-img-top" alt="...">
                        <div class="card-body">
                          <h5 class="card-title">{{$article->title}}</h5>
                          <p class="card-text">{{$article->body}}</p>
                          <p class="card-text">Prezzo: {{$article->price}}€</p>
                          <p class="card-text">Creato: {{$article->created_at}}</p>
                          {{-- <a href="#" class="btn btn-primary">Go somewhere</a> --}}
                        </div>
                      </div>
                </div>
            @endforeach
        </div>
    </div>
</x-layout>