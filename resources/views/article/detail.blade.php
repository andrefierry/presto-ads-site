<x-layout>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 col-md-6 d-flex flex-column justify-content-start">
                <div class="ms-5">
                    <h1 class="display-2 mt-5 fw-bold title text">{{$article->title}}</h1>
                    <p class="display-5 fw-bold text mt-3">{{$article->price}}€</p>
                    <div class="w-100">
                        <p class="mt-5 fs-4 paragrafo-detail">{{$article->body}}</p>
                    </div>
                </div>
                    <div class="mt-auto d-flex justify-content-center">
                        <a href="{{route('welcome')}}"><button class="bg-button px-5 ms-5 fs-3">Torna alla home</button></a>
                    </div>
            </div>
            <div class="col-12 col-md-6 d-flex justify-content-center align-items-center">
                <img class="rounded shadow mt-5 me-5" src="https://picsum.photos/600" alt="" width="700px">
            </div>
        </div>
    </div>
</x-layout>