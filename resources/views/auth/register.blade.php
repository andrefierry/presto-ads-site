<x-layout>
<div class="row justify-content-center">
    @if (session('message'))
            <div class="alert alert-success">
                {{session('message')}}
            </div>
    @endif
      <div class="container mt-5">
        <div class="row justify-content-center">
          <div class="col-9 p-5 shadow form-custom rounded">
            <div class="col-6 form p-5 rounded border border-2 shadow border border-dark">
              <h2 class="fw-bold display-5 text-center">{{__('ui.registrati')}}</h2>
                <p class="text text-center mt-3 mb-4 fs-6">{{__('ui.areaRevisore')}}</p>
              <form method="POST" action="{{route('register')}}">
                @csrf
                <div class="mb-3">
                  <label for="name" class="form-label text fs-6">{{__('ui.nomeUtente')}}</label>
                  <input name="name" type="text" class="form-control" id="name" aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label text fs-6">Email</label>
                <input name="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
              </div>
              <div class="mb-3">
                <label for="password" class="form-label text fs-6">Password</label>
                <input name="password" type="password" class="form-control" id="password">
              </div>
              <div class="mb-3">
                  <label for="password_confirmation" class="form-label text fs-6">{{__('ui.confermaPassword')}}</label>
                  <input name="password_confirmation" type="password" class="form-control" id="password_confirmation">
                </div>
                <div class="d-flex justify-content-center">
                  <button type="submit" class="bg-button px-5">{{__('ui.registrati')}}</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
</div>
</x-layout>