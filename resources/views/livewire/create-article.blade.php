<div>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <h1 class="text-center text-primary fw-bold display-3">Crea il tuo articolo</h1>
            <div class="col-12 col-md-8 rounded shadow p-5">
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
                    <div class="mb-3 mb-4">
                        <label for="title" class="form-label text-primary fs-3">Titolo:</label>
                        <input wire:model.live="title" type="text" class="form-control" id="title">
                    </div>
                    <div class="form-floating mb-4">
                        <textarea wire:model.live="body" class="form-control" placeholder="Leave a comment here" id="body" style="height: 100px"></textarea>
                        <label for="body">Inserisci il tuo commento:</label>
                    </div>
                    <div class="mb-3">
                        <label for="price" class="form-label text-primary fs-3">Prezzo:</label>
                        <input wire:model.live="price" type="text" class="form-control" id="price">
                    </div>
                    <div class="d-flex justify-content-center">
                        <button type="submit" class="btn btn-primary px-5">Submit</button>
                    </div>
                  </form>
            </div>
        </div>
    </div>
</div>
