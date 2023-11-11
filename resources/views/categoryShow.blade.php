<x-layout>
    <div class="container-fluid bg-category mb-5 p-0">
        <div class="row bg-revision p-0">
            <div class="col-12 display-2 p-4  text-white text-center text-lg-center">{{__('ui.visualizzaCategoria')}} {{$category->name}}</div>
        </div>
        <div class="row p-5 m-0 justify-content-center border-bottom border-dark bg-carousel">
            @foreach ($divCategories as $category)
            <div class="col-12 col-lg-2 my-4 d-flex flex-column justify-content-center align-items-center">
                @if($category->name == 'Elettronica')
                    <div>
                        <i class="bi bi-lightning-charge-fill fs-1"></i>
                    </div>
                @elseif($category->name == 'Finanza')
                    <i class="bi bi-piggy-bank-fill fs-1"></i>
                @elseif($category->name == 'Motori')
                    <i class="bi bi-car-front-fill fs-1"></i>
                @elseif($category->name == 'Viaggi')    
                    <i class="bi bi-geo-alt-fill fs-1"></i>
                @elseif($category->name == 'Collezionismo')  
                    <i class="bi bi-box-seam fs-1"></i>
                @elseif($category->name == 'Abbigliamento')  
                    <i class="bi bi-handbag fs-1"></i>
                @elseif($category->name == 'Immobili') 
                    <i class="bi bi-house-check-fill fs-1"></i>
                @elseif($category->name == 'Lavoro') 
                    <i class="bi bi-person-workspace fs-1"></i>
                @elseif($category->name == 'Usato')
                    <i class="bi bi-recycle fs-1"></i>
                    @elseif($category->name == 'Sport')
                    <i class="bi bi-bicycle fs-1"></i>
                @endif
                <a class="fw-bold text fs-3 text-decoration-none text-center" href="{{route('categoryShow',compact('category'))}}">{{__( 'ui.'. $category->name )}}</a>
            </div>
            @endforeach
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="row">
                    @forelse($categoriesFiltered as $key=>$article)
                        {{-- <div class="col-12 col-md-4 d-flex justify-content-center my-4">
                            <div class="card shadow" style="width: 18rem;">
                                <img src="https://picsum.photos/20{{$key}}" class="card-img-top" alt="...">
                                <div class="card-body">
                                <h5 class="card-title">{{$article->title}}</h5>
                                <p class="card-text">{{$article->body}}</p>
                                <p class="card-text">Prezzo: {{$article->price}}€</p>
                                <p class="card-text">Creato: {{$article->created_at}}</p>
                                <a href="{{route('article.detail',compact('article'))}}" class="btn btn-primary">vai al dettaglio</a>
                                </div>
                            </div>
                        </div> --}}
                            <div class="col-12 col-lg-4 p-0 d-flex justify-content-center">
                                <div class="wrapper">
                                    <div class="product-img">
                                    <img src="https://picsum.photos/20{{$key}}" height="420" width="327">
                                    </div>
                                    <div class="product-info">
                                    <div class="product-text">
                                        <h1 class="mb-3 text fw-bold text-card">{{$article->title}}</h1>
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
                    @empty
                       <div class="col-12 ms-5">
                            <p class="h1 text display-5 fw-bold">Non è presente alcun articolo per questa categoria!</p>
                            <p class="mt-5 fs-2 text fw-bold">Pubblicane uno: <a href="{{route('article.form-create')}}" class=" fs-3 ms-4 bg-button px-5">Crea articolo</a></p>
                        </div> 
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</x-layout>