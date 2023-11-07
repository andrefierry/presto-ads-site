<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h2>Ecco i dati da inserire</h2>
    <p>Nome : {{$user->name}}</p>
    <p>Email : {{$user->email}}</p>
    <p>Se vuoi renderlo revisore clicca qui:</p>
    <a href="{{route('make.revisor', compact('user'))}}">rendi revisore </a>
</body>
</html>
