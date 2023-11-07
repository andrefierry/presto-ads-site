<x-layout>
    <h2>Ecco i dati da inserire</h2>
    <p>Nome : {{$user->name}}</p>
    <p>Email : {{$user->email}}</p>
    <p>Se vuoi renderlo revisore clicca qui:</p>
    <a href="{{route('make.revisor', compact('user'))}}">rendi revisore </a>
</x-layout>