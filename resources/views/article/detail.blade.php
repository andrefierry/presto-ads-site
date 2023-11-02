<x-layout>
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-4">
                <h1 class="display-2 mt-5">{{$article->title}}</h1>
                <p class="fs-3 fw-bold">Prezzo del prodotto: {{$article->price}}€</p>
                <p class="mt-5 fs-2">{{$article->body}}</p>
            </div>
            <div class="col-12 col-md-8 d-flex justify-content-end align-items-center">
                <img class="rounded shadow mt-5 me-5" src="https://picsum.photos/600" alt="" width="600px">
            </div>
        </div>
    </div>
</x-layout>