<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Presto.it</title>
    @vite(['resources/css/app.css'])
</head>

<body>
    <div>
        <h1 id="tem-email"> RICHIESTA REVISORE </h1>
        <h2 id="tem-email"> {{ $user->name }} ha chiesto di lavorare con noi!</h2>
        <h3><b>Dati personali</b></h3>
        <p style="">Nome: <em>{{ $user->name }}</em></p>
        <p>Cognome: <em>{{ $user->surname }}</em></p>
        <p>Email:<em>{{ $user->email }}</em></p>
        <p>Messaggio:<em>{{ $description }}</em></p>
        <p><b>Se vuoi autorizzare l'utente clicca qui:</b></p>
        <a href="{{ route('make.revisor', compact('user')) }}">Rendi revisore</a>
    </div>
</body>

</html>
