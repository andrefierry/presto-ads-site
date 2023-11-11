<x-layout>
    <div class="container-fluid p-0 mt-0">
        {{-- <div class=" bg-welcome">
            <h1 class="text-center display-2 fw-bold title">Presto.it</h1>
        </div> --}}
        <div class="row justify-content-center">
            <div class="w-50">
                @if (session('message'))
                <div class="alert alert-secondary">
                    {{session('message')}}
                </div>
                @endif
                
            </div>
        <div class="w-100 bg-welcome container-fluid">
            <div class="col-6 d-flex flex-column  justify-content-center mt-5">
                <h2 class="ms-5 display-3 fw-bold text mt-5">Cerca qui i tuoi articoli</h2>
                <form action="{{route('articles.search')}}" method="GET" class="d-flex ms-5 me-5 w-75 mt-5" role="search">
                    <input name="searched" class="form-control me-2 fs-5 bg-transparent border border-dark text-dark" type="search" placeholder="{{__('ui.ricerca')}}" aria-label="Search">
                    <button class="btn btn-dark fs-5 px-4 fw-bold" type="submit">Search</button>
                  </form>
                  <a href="{{route('article.form-create')}}" class="ms-5 fs-5 mt-4 text-dark fw-bold">oppure puoi caricarne uno</a>
            </div>
        </div>
            <div class=" d-flex align-items-center container-fluid  bg-carousel border-top border-dark">
                {{-- <h1 class="text-center display-2 fw-bold title ms-5 d-flex align-items-center"><img class="me-3" src="/images/logo.png" alt="" width="80px" height="80px">Presto.it</h1> --}}
                <div class="row align-items-center justify-content-center w-100 mt-5">
                    <div class="col-6 d-flex align-items-center justify-content-evenly">
                        <h2 class="display-4 ms-0 p-3 my-4 fw-bold text">{{__('ui.allArticles')}} <i class="bi bi-bag"></i></h2>
                    </div>
                </div>
            </div>
{{-- 
            <div class="col-12 my-5 shadow bg-banner">
                <h2 class="display-4 ms-5 p-3 my-4">I nostri ultimi articoli</h2>
            </div> --}}
                @foreach ($articles as $key => $article )
                <div class="col-12 p-0 d-lg-none">
                    <div class="wrapper ">
                        <div class="product-img">
                        <img src="https://picsum.photos/20{{$key}}" height="420" width="327">
                        </div>
                        <div class="product-info">
                            <div class="product-text">
                                <h1>{{$article->title}}</h1>
                                <h2>Presto.it</h2>
                                <p>{{$article->body}}</p>
                            </div>
                            <p><span class="fs-3">{{$article->price}}€</span></p>
                            <div class="product-price-btn d-flex align-items-center">
                                <button type="button" class="">{{__('ui.dettaglio')}}</button>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
                
                <div class="bg-carousel">
                <swiper-container class="mb-5 mySwiper d-none d-lg-inline-block" space-between="30" slides-per-view="auto" pagination="true"
                pagination-clickable="true">
                    @foreach ($articles as $key => $article )
                    <swiper-slide>
                        <div class="col-12  col-lg-5 p-0">
                            <div class="wrapper">
                                <div class="product-img">
                                <img src="{{!$article->images()->get()->isEmpty() ? $article->images()->first()->getUrl(400,300) : 'https://picsum.photos/20'.$key}}" width="400px" height="420px">
                                </div>    
                                <div class="product-info">           
                                    <div class="product-text">
                                        <h1 class="mb-2 text fw-bold text-card mt-2 pt-2">{{$article->title}}</h1>
                                        <h2 class="mb-1">Presto.it</h2>
                                        <p><span class="fs-6 text-card text-dark">{{__('ui.pubblicazione')}}: {{substr($article->created_at,0,11)}}</span></p>
                                        <p class="fs-5 text-card">{{substr($article->body,0,20)}}...</p>
                                    </div>
                                    <div class="product-price-btn d-flex align-items-center">
                                        <p><span class="fs-3 text-card">{{$article->price}}€</span></p>
                                        <a href="{{route('article.detail',compact('article'))}}"><button type="button" class="mt-3 text-card">{{__('ui.dettaglio')}}</button></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </swiper-slide>
                    @endforeach
            </swiper-container>
            </div>
        </div>
    </div>

    <div class="div-vuoto d-flex align-items-center justify-content-center bg-carousel">
        <a href="{{route('article.all',compact('articles'))}}" class="display-5 text-decoration-none bg-button text-white px-5 py-3 bg-all-articles">Vedi tutti i nostri articoli</a>
    </div>

    <div class="container-fluid shadow  border-top border-dark">
        <div class="row p-5 shasow m-0 justify-content-center">
            @foreach ($categories as $category)
            <div class="col-12 col-lg-2 my-4 d-flex flex-column justify-content-center align-items-center">
                @if($category->name == 'Elettronica')
                    <i class="bi bi-lightning-charge-fill fs-1"></i>
                @elseif($category->name == 'Finanza')
                    <i class="bi bi-piggy-bank-fill fs-1"></i>
                @elseif($category->name == 'Motori')
                    <i class="bi bi-car-front-fill fs-1"></i>
                @elseif($category->name == 'Viaggi')    
                    <i class="bi bi-geo-alt-fill fs-1"></i>
                @elseif($category->name == 'Collezionismo')  
                    <i class="bi bi-box-seam fs-1"></i>
                @elseif($category->name == 'Abbigliamento')  
                    <i class="bi bi-handbag fs-1"></i>
                @elseif($category->name == 'Immobili') 
                    <i class="bi bi-house-check-fill fs-1"></i>
                @elseif($category->name == 'Lavoro') 
                    <i class="bi bi-person-workspace fs-1"></i>
                @elseif($category->name == 'Usato')
                    <i class="bi bi-recycle fs-1"></i>
                    @elseif($category->name == 'Sport')
                    <i class="bi bi-bicycle fs-1"></i>
                @endif
                <a class="fw-bold text fs-3 text-decoration-none text-center" href="{{route('categoryShow',compact('category'))}}">{{__( 'ui.'. $category->name )}}</a>
            </div>
            @endforeach
        </div>
    </div>
    {{-- GIT PUSH PROVA --}}
</x-layout>
