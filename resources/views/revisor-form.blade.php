<x-layout>
    <div class="container-fluid mt-5">
        <div class="row justify-content-center">
            {{-- <div class=" mb-5 bg-welcome">
                <h1 class="text-center my-5 display-2 fw-bold title py-4">Crea il tuo articolo</h1>
            </div> --}}
            <div class="col-12 col-md-6 p-0">
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
                <div class="container-fluid rounded border border-2 border-danger mt-5 shadow">
                    <div class="row">
                        <div class="col-12 col-lg-6 p-4 border-end border-danger">
                            <form method='POST' action="{{route('become.revisor')}}">
                                @csrf
                                <h2 class="d-block d-lg-none mb-3 text-dark fw-bold text-center">{{__('ui.diventaRevisore')}}</h2>
                                <div class="mb-4">
                                    <label for="name" class="form-label text-dark fs-6 fw-bold mt-3">{{__('ui.inserisciNome')}}</label>
                                    <input name="name" type="text" class="form-control w-100" id="name">
                                </div>
                                <div class="mb-4">
                                    <label for="email" class="form-label text-dark fs-6 fw-bold">{{__('ui.inserisciEmail')}}</label>
                                    <input name="email" type="text" class="form-control w-100" id="email">
                                </div>
                                 <label class="form-label text-dark fs-6 fw-bold">{{__('ui.percheRevisore')}}</label>
                                <div class="form-floating mb-4">
                                    <textarea name="body" class="form-control" placeholder="Leave a comment here" id="body" style="height: 100px"></textarea>
                                    <label for="body">{{__('ui.inserisciMotivazione')}}</label>
                                </div>
                                <div class="d-flex justify-content-center">
                                    <button type="submit" class="btn btn-outline-danger shadow px-5 mt-3 text fw-bold" role="button">{{__('ui.diventaRevisore')}}</button>
                                </div>
                            </form>
                        </div>
                        <div class="d-sm-none col-md-4 col-lg-6 d-lg-flex align-items-center justify-content-center border border-left-2 flex-column">
                            {{-- <h1 class="fw-bold mt-1 title text-center">Crea il tuo articolo</h1> --}}
                            <img src="/images/gmail.png" alt="#" width="180x">
                            <p class="text-primary fs-6 fw-bold text-center">{{__('ui.inserisciEmail')}}</p>
                            <p class="text-primary fs-5 fw-bold text-center ">{{__('ui.diventaRevisore')}}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>