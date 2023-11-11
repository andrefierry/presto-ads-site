<x-layout>
    <div class="div-profile"></div>
    <div class="container-profilo d-flex align-items-center">
        <i class="bi bi-person-circle icona-profilo ms-5"></i>
        <div class="d-flex flex-column ms-4 text">
            <h1 class="display-2">{{Auth::user()->name}}</h1>
            <p class="fs-3">{{Auth::user()->email}}</p>
        </div>
        <div class="ms-auto d-flex">
            <div class="status-online ms-3 d-flex align-items-center mt-4 me-4"></div>
            <h2 class="text-success display-4 me-5">Online</h2>
        </div>
    </div>
    @if(Auth::user()->is_revisor)
        <div class="d-flex display-4 me-5 justify-content-end mt-5">
            <p class="me-5">Sei un revisore</p>
            <i class="bi bi-eye-fill"></i>
        </div>
    @else
        <div class="d-flex display-4 me-5 justify-content-end mt-5">
            <p class="me-5">Non sei un revisore</p>
            <i class="bi bi-eye-slash-fill"></i>
        </div>
    @endif
    <div class="container-fluid mt-5">
        <div class="row">
             <h2 class="ms-5 py-5 text-white display-5 text text-center fw-bold">Ecco gli articoli che hai creato</h2>
            @foreach($articles as $key=>$article)
                @if($article->user_id == Auth::user()->id)
                <div class="col-12 col-lg-4 p-0 d-flex justify-content-center">
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
                            
                            <a  href="{{route('article.detail',compact('article'))}}"><button class="bg-button mt-3">{{__('ui.dettaglio')}}</button></a>
                        </div>
                        </div>
                    </div>
                </div>
                @endif
            @endforeach
        </div>
    </div>
    <div class="div-vuoto"></div>
    <div class="d-flex display-5 justify-content-center align-items-center mb-5">
        <i class="bi bi-twitter-x text-dark me-5"></i>
        <i class="bi bi-facebook text-primary me-5"></i>
        <i class="bi bi-pinterest text-danger me-5"></i>
        <i class="bi bi-instagram icona-insta"></i>
    </div>
</x-layout>