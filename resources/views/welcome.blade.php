<x-layout>
    <div class="container-fluid p-0 mt-0">
        {{-- <div class=" bg-welcome">
            <h1 class="text-center display-2 fw-bold title">Presto.it</h1>
        </div> --}}
        <div class="row justify-content-center">
            <div class="w-50 mt-4">
                @if (session('message'))
                <div class="alert alert-secondary">
                    {{session('message')}}
                </div>
                @endif
                
        </div>
        <div class="my-4 d-flex align-items-center container-fluid">
            {{-- <h1 class="text-center display-2 fw-bold title ms-5 d-flex align-items-center"><img class="me-3" src="/images/logo.png" alt="" width="80px" height="80px">Presto.it</h1> --}}
            <div class="row align-items-center w-100">
                <div class="col-6 d-flex align-items-center justify-content-evenly">
                    <h2 class="display-4 ms-0 p-3 my-4 fw-bold">{{__('ui.allArticles')}}</h2>
                </div>
                <div class="col-6 d-flex align-items-center justify-content-center">
                    <form action="{{route('articles.search')}}" method="GET" class="d-flex ms-auto me-5 w-50" role="search">
                        <input name="searched" class="form-control me-2 fs-5" type="search" placeholder="{{__('ui.ricerca')}}" aria-label="Search">
                        <button class="btn btn-outline-primary fs-5 px-4 fw-bold" type="submit">Search</button>
                      </form>
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
           
            <swiper-container class="mySwiper mt-5 d-none d-lg-inline-block" space-between="30" slides-per-view="auto" pagination="true"
            pagination-clickable="true">
                @foreach ($articles as $key => $article )
                <swiper-slide>
                    <div class="col-12  col-lg-5 p-0">
                        <div class="wrapper">
                            <div class="product-img">
                            <img src="https://picsum.photos/20{{$key}}" height="420" width="327">
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
        {{-- @foreach($categories as $category)
           @@switch($type)
               @case(1)
                   
                   @break
               @case(2)
                   
                   @break
               @default
                   
           @endswitch
        @endforeach --}}
        </div>
    </div>
</x-layout>
