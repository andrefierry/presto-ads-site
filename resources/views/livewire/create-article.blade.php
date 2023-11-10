<div>
    <div class="container-fluid mt-5 vh-100">
        <div class="row justify-content-center">
            {{-- <div class=" mb-5 bg-welcome">
                <h1 class="text-center my-5 display-2 fw-bold title py-4">Crea il tuo articolo</h1>
            </div> --}}
            <div class="col-12 col-md-10 p-0">
                @if (session('message'))
                <div class="alert alert-success">
                    {{session('message')}}
                </div>
                @endif
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                
                <div class="container-fluid shadow rounded mt-5 border border-dark">
                    <div class="row">
                        <div class="col-12 col-lg-7 mt-5 p-4">
                            <form wire:submit.prevent='store' enctype="multipart/form-data">
                                @csrf
                                <h2 class="d-block d-lg-none mb-3 text fw-bold text-center">{{__('ui.creaArticolo')}}</h2>
                                <div class="mb-4">
                                    <label for="title" class="form-label text fs-4 fw-bold">{{__('ui.inserireTitolo')}}</label>
                                    <input wire:model.live="title" type="text" class="form-control w-100" id="title">
                                </div>
                                <label class="form-label text fs-5 fw-bold">{{__('ui.descrizione')}}</label>
                                <div class="form-floating mb-4">
                                    <textarea wire:model.live="body" class="form-control" placeholder="Leave a comment here" id="body" style="height: 100px"></textarea>
                                    <label for="body">{{__('ui.commento')}}:</label>
                                </div>
                                <div class="mb-4">
                                    <label for="price" class="form-label text fs-5 fw-bold">{{__('ui.prezzo')}}</label>
                                    <input wire:model.live="price" type="text" class="form-control w-25" id="price">
                                </div>
                                {{-- @if ($photo)
                                <div class="col-12 d-flex flex-column">
                                    Photo Preview:
                                    <img class="my-3 shadow rounded" width="100px" height="100px" src="{{ $photo->temporaryUrl() }}">    
                                </div>
                                @endif --}}
                                {{-- <input type="file" wire:model="photo" class="my-4"> --}}
                                <div class="mb-3">
                                    <input wire:model="temporary_images" type="file" name="images" multiple class="form-control w-50 @error('temporary_images.*') is-invalid @enderror" placeholder='Img'/>
                                    @error('temporary_images.*')
                                    <p class="text-danger mt-2">{{$message}}</p>
                                    @enderror
                                </div>
                                @if ($images)

                                <div class="row">
                                    <div class="col-12 d-flex flex-column">
                                        <p>Photo Preview:</p> 
                                        <div class="row border border-4 border-info rounded shadow py-4">
                                            @foreach ($images as $key=>$image)
                                            {{-- <img class="my-3 shadow rounded" width="100px" height="100px" src="{{ $photo->temporaryUrl() }}">     --}}
                                            <div class="col my-3" >
                                                <div class="mx-auto shadow rounded img-preview" style="background-image: url({{$image->temporaryUrl()}});"></div>
                                                <button type="button" class="btn btn-danger shadow d-block text-center mt-2 mx-auto" width="5px" height="5px" wire:click="removeImage({{$key}})">Cancella</button>
                                            </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                                @endif
                                <div class="mb-3">
                                    <label for="category" class="form-label text fs-5 mb-3 fw-bold">{{__('ui.scegliCategoria')}}</label>
                                    <select wire:model.defer="category" id="category" class="form-control w-50">
                                        {{-- <option value=""> Scegli la tua categoria</option> --}}
                                        @foreach ($categories as $category )
                                        <option value="{{$category->id}}">{{$category->name}}</option>
                                        @endforeach
                                    </select>
                                    
                                </div>
                                <div class="d-flex justify-content-center">
                                    <button type="submit" class="bg-button shadow px-5 mt-3" role="button">{{__('ui.creaArticolo')}}</button>
                                </div>
                            </form>
                        </div>
                        <div class="d-sm-none col-md-4 col-lg-5 d-lg-flex align-items-center justify-content-center border border-left-2 form-create">
                            <h1 class="fw-bold mt-1 title text-center display-2 ">{{__('ui.creaArticolo')}}</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
