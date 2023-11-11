<x-layout>
    <div class="container-fluid mb-5 p-0">
        <div class="col-12 mb-5 p-0 bg-revision">
            <h2 class="display-4 mb-4 text-white ms-5 p-4">Dettaglio {{$article->title}}</h2>
        </div>
        <div class="row  py-5 mx-5  justify-content-center">
            <div class="col-10 d-flex border border-dark bg-detail py-5 rounded shadow">
            <div class="col-12 col-md-6 d-flex flex-column justify-content-start mb-5">
                <div class="ms-5">
                    <h1 class="display-1 mt-5 fw-bold title text ms-2">{{$article->title}}</h1>
                    <p class="display-5 text mt-3 ms-2">{{$article->price}}€</p>
                    <div class="w-100 ms-2">
                        <p class="mt-5 fs-4 paragrafo-detail">{{$article->body}}</p>
                    </div>
                </div>
                    <div class="mt-auto d-flex justify-content-center">
                        <a href="{{route('welcome')}}"><button class="bg-button px-5 ms-5 fs-3">Torna alla home</button></a>
                    </div>
            </div>
            <div class="col-12 col-md-6 d-flex flex-column mb-5">
                <div class="d-flex justify-content-end flex-column container">
                    <div class="row">
                        <div class="col-12 d-flex justify-content-center">
                            <img class="rounded shadow mt-5 ms-5 grandezza-img me-5" src="https://picsum.photos/800/600" alt="" width="88%" height="600px">
                        </div>
                        <div class="col-12 d-lg-flex d-none justify-content-evenly">
                                <img class="rounded shadow mt-5 miniature" src="https://picsum.photos/601" alt="" width="200px">
                                <img class="rounded shadow mt-5 miniature" src="https://picsum.photos/602" alt="" width="200px">
                                <img class="rounded shadow mt-5 miniature" src="https://picsum.photos/603" alt="" width="200px">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
</x-layout>