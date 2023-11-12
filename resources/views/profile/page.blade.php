<x-layout>
    <div class="div-profile"></div>
    <div class="container-profilo d-flex align-items-center">
        <i class="bi bi-person-circle icona-profilo ms-5"></i>
        <div class="d-flex flex-column ms-4 text">
            <h1 class="display-6">{{Auth::user()->name}}</h1>
            <p class="fs-5">{{Auth::user()->email}}</p>
        </div>
        <div class="ms-auto d-flex align-items-center">
            <div class="status-online ms-3 d-flex  me-2"></div>
            <h2 class="text-success fs-2 me-5">Online</h2>
        </div>
    </div>
    <div class="row align-items-center mt-5">
        <div class="col-6 mt-5">
            <div class="d-flex display-6 justify-content-start align-items-center ms-2">
                <i class="bi bi-twitter-x text-dark me-5 ms-5"></i>
                <i class="bi bi-facebook text-primary me-5"></i>
                <i class="bi bi-pinterest text-danger me-5"></i>
                <i class="bi bi-instagram icona-insta"></i>
            </div>
        </div>
        @if(Auth::user()->is_revisor)
            <div class="col-6 mt-5">
                <div class="d-flex display-6 me-5 justify-content-end align-items-center">
                    <p class="me-5">{{__('ui.seiRevisore')}}</p>
                    <i class="bi bi-eye-fill"></i>
                </div>
        </div>
        @else
        <div class="col-6 mt-5">
            <div class="d-flex display-6 me-5 justify-content-end">
                <p class="me-5">{{__('ui.nonSeiRevisore')}}</p>
                <i class="bi bi-eye-slash-fill"></i>
            </div>
        </div>
        @endif
    </div>
    <div class="container-fluid mt-5">
        <div class="row">
             <h2 class=" py-5 text-white display-6 text text-center fw-bold">{{__('ui.articoliCreati')}}</h2>
            @foreach($articles as $key=>$article)
                @if($article->user_id == Auth::user()->id)
                <div class="col-12 col-lg-4 p-0 d-flex justify-content-center">
                    <div class="wrapper">
                        <div class="product-img">
                        <img src="{{!$article->images()->get()->isEmpty() ? $article->images()->first()->getUrl(400,300) : 'https://picsum.photos/20'.$key}}" height="320px" width="327px">
                        </div>
                        <div class="product-info">
                        <div class="product-text">
                            <h1 class="mb-3 text fw-bold text-card">{{substr($article->title,0,10)}}@if(strlen($article->title) >= 10)... @endif</h1>
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
</x-layout>