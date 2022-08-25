<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    {{-- <h1>Ciao {{ $lead->name }}</h1> --}}
    <p>
       hai aggiunto un nuovo gioco
       {{ $game->title }}
    </p>
    {{-- <p>{{ $lead->message }}</p> --}}
    <p>{{ $game->price }}</p>
</body>
</html>
