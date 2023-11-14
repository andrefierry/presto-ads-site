<x-layout>
    <div class="container-fluid mb-5 p-0">
        <div class="col-12 mb-5 p-0 bg-revision">
            <h2 class="display-6 mb-4 text-white text-center ms-5 p-4">{{__('ui.dettaglio')}} {{$article->title}}</h2>
        </div>
        <div class="row  py-5 mx-5  justify-content-center">
            <div class="col-10 d-flex border border-dark bg-detail py-5 rounded shadow">
            <div class="col-12 col-md-6 d-flex flex-column justify-content-start mb-5">
                <div class="ms-5">
                    <h1 class="display-4 mt-5 fw-bold title text ms-2">{{$article->title}}</h1>
                    <p class="display-6 text mt-3 ms-2">{{$article->price}}€</p>
                    <div class="w-100 ms-2">
                        <p class="mt-5 fs-4 paragrafo-detail">{{$article->body}}</p>
                    </div>
                </div>
                    <div class="mt-auto d-flex justify-content-center">
                        <a href="{{route('welcome')}}"><button class="bg-button px-5 ms-5 fs-6">{{__('ui.tornaHome')}}</button></a>
                    </div>
            </div>
            <div class="col-12 col-md-6 d-flex flex-column mb-5">
                <div class="d-flex justify-content-end flex-column container">
                    <div class="row">
                        <div class="col-12 d-flex justify-content-center">
                            <img class="rounded shadow mt-5 ms-5 grandezza-img me-5" src="{{!$article->images()->get()->isEmpty() ? $article->images()->first()->getUrl(400,300) : 'https://picsum.photos/20'}}" alt="" width="88%" height="360px">
                        </div>
                        <div class="col-12 d-lg-flex d-none justify-content-evenly">
                            <img class="rounded shadow mt-5 miniature" src="https://picsum.photos/300" alt="" width="170px">
                            <img class="rounded shadow mt-5 miniature" src="https://picsum.photos/301" alt="" width="170px">
                            <img class="rounded shadow mt-5 miniature" src="https://picsum.photos/302" alt="" width="170px">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
</x-layout>