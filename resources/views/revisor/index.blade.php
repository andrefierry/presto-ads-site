<x-layout>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 p-3 bg-revision">
                <h1 class="display-2 fw-bold text">{{$article_to_check ? __('ui.articoloDaRevisionare') : __('ui.NoRevisioni') }}</h1>
            </div>
            <div>
                @if (session('message'))
            <div class="alert alert-success">
                {{session('message')}}
            </div>
            @endif
            <div class="col-12 col-md-4 d-flex justify-content-center mt-5">
                <form action="{{route('revisor.null_article', ['article'=>$article_to_null])}}" method="POST">
                    @csrf
                    @method('PATCH')
                    <button type="submit" class="btn btn-secondary shadow px-5">{{__('ui.annulla')}}</button>
                </form>
            </div>
                @if ($article_to_check)
                    <div class="container p-4 border border-1 mt-4 shadow rounded">
                        <div class="row">
                            <div class="col-12 d-flex flex-column align-items-center">
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
                            <h5 class="card-title fs-2 text fw-bold text-center">{{$article_to_check->title}}</h5>
                            <p class="card-text ms-3 text pw-bold fs-4">{{__('ui.descrizione')}}: {{$article_to_check->body}}</p>
                            <p class="card-footer text-center">{{__('ui.pubblicazione')}}: {{$article_to_check->created_at->format('d/m/Y')}}</p>
                        </div>
                        <div class="row">
                            <div class="col-12 col-md-4 d-flex justify-content-center">
                                <form action="{{route('revisor.accept_article', ['article'=>$article_to_check])}}" method="POST">
                                    @csrf
                                    @method('PATCH')
                                    <button type="submit" class="btn btn-success shadow px-5">{{__('ui.accetta')}}</button>
                                </form>
                            </div>
                            <div class="col-12 col-md-4 d-flex justify-content-center">
                                <form action="{{route('revisor.reject_article', ['article'=>$article_to_check])}}" method="POST">
                                    @csrf
                                    @method('PATCH')
                                    <button type="submit" class="btn btn-danger shadow px-5">{{__('ui.rifiuta')}}</button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
</x-layout>