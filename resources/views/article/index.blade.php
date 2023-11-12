<x-layout>
    <div class="container-fluid mt-5">
        <div class="row">
            <div class="col-12">
                <div class="row">
                    <div class="col-12 ms-5">
                        <p class="h1 text display-5 fw-bold">{{__('ui.risultatiRicerca')}}</p>
                    </div> 
                    @forelse($articles as $key=>$article)
                    <div class="d-flex justify-content-center mt-4">
                        <div class="w-25 text-center">
                            <a href="{{route('categoryShow', ['category'=>$article->category])}}" class="my-2 border-top pt-2 border-dark card-link shadow bg-button px-5"> {{__('ui.categoria')}}: {{__('ui.'.$article->category->name)}}</a>
                        </div>
                    </div>
                            <div class="col-12 col-lg-6 p-0 d-flex justify-content-center">
                                <div class="wrapper">
                                    <div class="product-img">
                                        <img src="{{$article->images()->get()->isEmpty() ? Storage::url($article->images()->first()->path):'https://picsum.photos/200'}}" width="252px" height="319px">
                                    </div>
                                    <div class="product-info">
                                        <div class="product-text">
                                            <h1 class="mb-3 text fw-bold text-card">{{$article->title}}</h1>
                                            <h2>Presto.it</h2>
                                            <p class="fs-5 text-card">{{substr($article->body,0,20)}}...</p>
                                        </div>
                                        <div class="product-price-btn d-flex align-items-center">
                                            <p><span class="fs-3 text-card">{{$article->price}}€</span></p>
                                            <a href="{{route('article.detail',compact('article'))}}"><button class="bg-button mt-3">{{__('ui.dettaglio')}}</button></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @empty
                        <div class="col-12 ms-5">
                            <p class="h1 text display-5 fw-bold">{{__('ui.ricercaCorrisponde')}}</p>
                        </div> 
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</x-layout>