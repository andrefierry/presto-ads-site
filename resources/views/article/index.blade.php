<x-layout>
    <div class="container-fluid mt-5">
        <div class="row">
            <div class="col-12">
                <div class="row">
                    <div class="col-12 ms-5">
                        <p class="h1 text display-5 fw-bold">Ecco qui i risultati della tua ricerca</p>
                    </div> 
                    @forelse($articles as $key=>$article)
                            <div class="col-12 col-lg-6 p-0 d-flex justify-content-center">
                                <div class="wrapper">
                                    <div class="product-img">
                                        <img src="https://picsum.photos/20{{$key}}" height="420" width="327">
                                    </div>
                                    <div class="product-info">
                                        <div class="product-text">
                                            <h1 class="mb-3 text fw-bold text-card">{{$article->title}}</h1>
                                            <h2>Presto.it</h2>
                                            <p class="fs-5 text-card">{{substr($article->body,0,20)}}...</p>
                                        </div>
                                        <div class="product-price-btn d-flex align-items-center">
                                            <p><span class="fs-3 text-card">{{$article->price}}€</span></p>
                                            
                                            <a href="{{route('article.detail',compact('article'))}}"><button class="bg-button mt-3">dettaglio</button></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    @empty
                        <div class="col-12 ms-5">
                            <p class="h1 text display-5 fw-bold">La tua ricerca non corrisponde ad alcun articolo!</p>
                        </div> 
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</x-layout>