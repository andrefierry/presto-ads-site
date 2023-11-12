<x-layout>
    <h1 class="text-center text-white mb-5 p-4 display-5 bg-revision">Ecco tutti i nostri articoli</h1>
    <div class="container-fluid">
        <div class="row">
            @foreach($articles as $key=>$article)
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
            @endforeach
        </div>
    </div>
</x-layout>