<x-layout>
    <div class="container-fluid p-0 mt-0">
        <div class=" mb-5 bg-welcome">
            <h1 class="text-center mb-5 display-2 fw-bold title">Presto.it</h1>
        </div>
        <div class="row justify-content-center">
            <swiper-container class="mySwiper" space-between="30" slides-per-view="auto" pagination="true"
            pagination-clickable="true">
                @foreach ($articles as $key => $article )
                {{-- <div class="col-12  col-lg-5 p-0">
                <div class="wrapper">
                    <div class="product-img">
                      <img src="https://picsum.photos/20{{$key}}" height="420" width="327">
                    </div>
                    <div class="product-info">
                      <div class="product-text">
                        <h1>{{$article->title}}</h1>
                        <h2>Presto.it</h2>
                        <p>{{$article->body}}</p>
                      </div>
                      <div class="product-price-btn d-flex align-items-center">
                        <p><span class="fs-3">{{$article->price}}€</span></p>
                        <button type="button" class="mt-3">dettaglio</button>
                      </div>
                    </div>
                </div>
            </div> --}}
            <swiper-slide>
                <div class="col-12  col-lg-5 p-0">
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
                            <button type="button" class="mt-3 text-card">dettaglio</button>
                        </div>
                        </div>
                    </div>
                </div>
            </swiper-slide>
            @endforeach
        </swiper-container>
        </div>
    </div>
</x-layout>
