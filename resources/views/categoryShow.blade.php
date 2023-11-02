<x-layout>
    <div class="container-fluid bg-category p-5 my-5">
        <div class="row">
            <div class="col-12 display-2 p-5 fw-bold text-white">Stai visualizzando la categoria {{$category->name}}</div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="row">
                    @forelse($category->articles as $key=>$article)
                        <div class="col-12 col-md-4 d-flex justify-content-center my-4">
                            <div class="card shadow" style="width: 18rem;">
                                <img src="https://picsum.photos/20{{$key}}" class="card-img-top" alt="...">
                                <div class="card-body">
                                <h5 class="card-title">{{$article->title}}</h5>
                                <p class="card-text">{{$article->body}}</p>
                                <p class="card-text">Prezzo: {{$article->price}}€</p>
                                <p class="card-text">Creato: {{$article->created_at}}</p>
                                <a href="{{route('article.detail',compact('article'))}}" class="btn btn-primary">vai al dettaglio</a>
                                </div>
                            </div>
                        </div>
                    @empty
                       <div class="col-12">
                            <p class="h1 text display-5 fw-bold">Non è presente alcun articolo per questa categoria!</p>
                            <p class="mt-5 fs-2 text fw-bold">Pubblicane uno: <a href="{{route('article.form-create')}}" class=" fs-3 ms-4 bg-button px-5">Crea articolo</a></p>
                        </div> 
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</x-layout>