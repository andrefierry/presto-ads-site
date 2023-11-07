<x-layout>
    <div class="container-fluid">
        <div class="col-12 my-5">
            <h2 class="display-4 ms-5 p-3 my-4 fw-bold">Dettaglio {{$article->title}}</h2>
        </div>
        <div class="row border border-1 py-5 mx-5">
            <div class="col-12 col-md-5 d-flex flex-column justify-content-start">
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
            <div class="col-12 col-md-7 d-flex justify-content-start align-items-center">
                    <div class="d-flex flex-column d-none d-lg-inline">
                        <img class="rounded shadow mt-5 me-5 miniature" src="https://picsum.photos/601" alt="" width="200px">
                        <img class="rounded shadow mt-5 me-5 miniature" src="https://picsum.photos/602" alt="" width="200px">
                        <img class="rounded shadow mt-5 me-5 miniature" src="https://picsum.photos/603" alt="" width="200px">
                        <img class="rounded shadow mt-5 me-5 miniature" src="https://picsum.photos/604" alt="" width="200px">
                        <img class="rounded shadow mt-5 me-5 miniature" src="https://picsum.photos/605" alt="" width="200px">
                        <img class="rounded shadow mt-5 me-5 miniature" src="https://picsum.photos/606" alt="" width="200px">

                    </div>
                    <div class="d-flex justify-content-end">
                        <img class="rounded shadow mt-5 ms-5 grandezza-img" src="https://picsum.photos/600" alt="" width="700px">
                    </div>
            </div>
        </div>
    </div>
</x-layout>