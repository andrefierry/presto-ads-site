<div>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <h1 class="text-center fw-bold display-3 text mb-5">Crea il tuo articolo</h1>
            <div class="col-12 col-md-8 rounded shadow p-5 back-form">
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
                <form wire:submit.prevent='store'>
                    @csrf
                    <div class="mb-4">
                        <label for="title" class="form-label text fs-4">Inserire un titolo</label>
                        <input wire:model.live="title" type="text" class="form-control form-layout w-50" id="title">
                    </div>
                    <label class="form-label text fs-4">Inserisci una descrizione</label>
                    <div class="form-floating mb-4">
                        <textarea wire:model.live="body" class="form-control form-layout" placeholder="Leave a comment here" id="body" style="height: 100px"></textarea>
                        <label for="body">Inserisci il tuo commento:</label>
                    </div>
                    <div class="mb-4">
                        <label for="price" class="form-label text fs-4">Prezzo</label>
                        <input wire:model.live="price" type="text" class="form-control form-layout w-25" id="price">
                    </div>
                    <div class="mb-3">
                        <label for="category" class="form-label text fs-4 mb-3">Scegli la Categoria</label>
                        <select wire:model.defer="category" id="category" class="form-control form-layout w-25">
                            {{-- <option value=""> Scegli la tua categoria</option> --}}
                            @foreach ($categories as $category )
                            <option value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach
                        </select>
                      </div>
                    <div class="d-flex justify-content-center">
                        <button type="submit" class="btn btn-secondary shadow" role="button">Crea il tuo articolo</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
