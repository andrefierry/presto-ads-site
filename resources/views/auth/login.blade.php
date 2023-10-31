<x-layout>
<div class="row justify-content-center">
    @if (session('message'))
            <div class="alert alert-success">
                {{session('message')}}
            </div>
        @endif
    <form method="POST" action="{{route('login')}}">
        @csrf
        <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label">Email</label>
          <input name="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
          <label for="password" class="form-label">Password</label>
          <input name="password" type="password" class="form-control" id="password">
        </div>
        
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
</div>
</x-layout>