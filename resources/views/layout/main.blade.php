<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="{{ asset(Storage::url('public/img/prestoit-logo-no-txt-little.ico')) }}">
    <title>Presto.it</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>

<body>

    <x-nav />
    <x-hero />

    {{ $slot }}
    @livewireScripts
</body>

</html>
