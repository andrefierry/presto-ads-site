<x-layout>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1 class="display-2">{{$article_to_check ? "Ecco l'articolo da revisionare" : 'Non ci sono articoli da revisionare'}}</h1>
            </div>
            <div>
                @if (session('message'))
            <div class="alert alert-success">
                {{session('message')}}
            </div>
            @endif
                @if ($article_to_check)
                    <div class="container">
                        <div class="row">
                            <div class="col-12">
                                <div id="showCarousel" class="carousel slide" data-bs-ride="carousel">
                                    <div class="carousel-inner">
                                        <div class="carousel-item active">
                                            <img src="https://picsum.photos/id/27/1200/400" class="img-fluid p-3 rounded " alt="">
                                        </div>
                                        <div class="carousel-item active">
                                            <img src="https://picsum.photos/id/28/1200/400" class="img-fluid p-3 rounded " alt="">
                                        </div>
                                        <div class="carousel-item active">
                                            <img src="https://picsum.photos/id/29/1200/400" class="img-fluid p-3 rounded " alt="">
                                        </div>
                                    </div>
                                </div>
                                <button class="carousel-control-prev" type="button" data-bs-target="#showCarousel" data-bs-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">prev</span>
                                </button>
                                <button class="carousel-control-next" type="button" data-bs-target="#showCarousel" data-bs-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">next</span>
                                </button>
                            </div>
                            <h5 class="card-title">Titolo:{{$article_to_check->title}}</h5>
                            <p class="card-text">Descrizione:{{$article_to_check->body}}</p>
                            <p class="card-footer">Pubblicato il:{{$article_to_check->created_at->format('d/m/Y')}}</p>
                        </div>
                        <div class="row">
                            <div class="col-12 col-md-6">
                                <form action="{{route('revisor.accept_article', ['article'=>$article_to_check])}}" method="POST">
                                    @csrf
                                    @method('PATCH')
                                    <button type="submit" class="btn btn-success shadow"> Accetta </button>
                                </form>
                            </div>
                            <div class="col-12 col-md-6 text-end">
                                <form action="{{route('revisor.reject_article', ['article'=>$article_to_check])}}" method="POST">
                                    @csrf
                                    @method('PATCH')
                                    <button type="submit" class="btn btn-danger shadow"> Rifiuta </button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
</x-layout>