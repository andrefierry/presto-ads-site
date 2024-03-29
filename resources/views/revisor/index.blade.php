<x-layout>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 p-3 bg-revision">
                <h1 class="display-6 text-white text-center">{{$article_to_check ? __('ui.articoloDaRevisionare') : __('ui.NoRevisioni') }}</h1>
            </div>
            <div>
                @if (session('message'))
            <div class="alert alert-success">
                {{session('message')}}
            </div>
            @endif
                @if ($article_to_check)
                    <div class="container p-4 border border-1 mt-5 shadow rounded bg-carousel border border-dark shadow">
                        <div class="row">
                            <div class="container">
                                <div class="row">

                                    <div class="col-6">
                                        <div id="showCarousel" class="carousel slide" data-bs-ride="carousel">
                                            @if ($article_to_check->images)
                                                <div class="carousel-inner">
                                                    @foreach ($article_to_check->images as $image)
                                                        <div class="carousel-item @if($loop->first)active @endif">
                                                            <img src="{{$image->getUrl(400,300)}}" class="img-fluid p-3 rounded" width="600px" height="300px" alt="">
                                                        </div>
                                                       
                                                    @endforeach
                                                </div>
                                            @else
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
                                            @endif
                                        <button class="carousel-control-prev" type="button" data-bs-target="#showCarousel" data-bs-slide="prev">
                                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                            <span class="visually-hidden">prev</span>
                                        </button>
                                        <button class="carousel-control-next" type="button" data-bs-target="#showCarousel" data-bs-slide="next">
                                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                            <span class="visually-hidden">next</span>
                                        </button>
                                    </div>
                                    </div>
                                    <div class="col-6">
                                        <h5 class="tc-accent mt-4 display-4">Revisione Immagini</h5>
                                            <div class="card-body">
                                                <h5 class="tc-accent my-3 fw-bold">Tags</h5>
                                                <p>Adulti: <span class="{{$image->adult}} fs-5"></span></p>
                                                <p>Satira: <span class="{{$image->spoof}} fs-5"></span></p>
                                                <p>Medicina: <span class="{{$image->medical}} fs-5"></span></p>
                                                <p>Violenza: <span class="{{$image->violence}} fs-5"></span></p>
                                                <p>Contenuto Ammiccante: <span class="{{$image->racy}} fs-5"></span></p>
                                            </div>

                                            <div class="col-md-3 border-end">
                                                
                                                <div class="p-2">
                                                    @if($image->labels)
                                                     @foreach ($image->labels as $label)
                                                     <p class="d-inline">{{$label}},</p>
                                                     @endforeach
                                                    @endif
                                                </div>
                                            </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 d-flex flex-column align-items-center">
                               
                            
                            <h5 class="card-title fs-2 text fw-bold text-center">{{$article_to_check->title}}</h5>
                            <p class="card-text ms-3 text pw-bold fs-4">{{__('ui.descrizione')}}: {{$article_to_check->body}}</p>
                            <p class="card-footer text-center">{{__('ui.pubblicazione')}}: {{$article_to_check->created_at->format('d/m/Y')}}</p>
                        </div>
                        <div class="row">
                            <div class="col-12 col-md-6 d-flex justify-content-center">
                                <form action="{{route('revisor.accept_article', ['article'=>$article_to_check])}}" method="POST">
                                    @csrf
                                    @method('PATCH')
                                    <button type="submit" class="btn btn-success shadow px-5">{{__('ui.accetta')}}</button>
                                </form>
                            </div>
                            <div class="col-12 col-md-6 d-flex justify-content-center">
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
            <div class="col-12 col-md-4 d-flex justify-content-center mt-5 w-100">
                <form action="{{route('revisor.null_article', ['article'=>$article_to_null])}}" method="POST">
                    @csrf
                    @method('PATCH')
                    <button type="submit" class="btn btn-secondary shadow px-5">{{__('ui.annulla')}}</button>
                </form>
            </div>
        </div>
    </div>
    <div class="div-vuoto"></div>
</x-layout>