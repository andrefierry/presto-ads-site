<form action="{{route('setLocale', $lang)}}" class="d-inline" method="POST">
    @csrf 
    <button type="submit" class="btn"><img src="{{asset('vendor/blade-flags/language-'.$lang.'.svg')}}" alt="" width='50px'></button>
</form>