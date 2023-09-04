<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="refresh" content="{{ config('session.lifetime') * 60 }}">
    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    {{-- <link rel="stylesheet" href="{{asset('css/app.css')}}"> --}}
    @vite(['resources/assets/css/app.css', 'resources/js/bootstrap.ts', 'resources/assets/css/style.min.css'])

    <!-- Styles -->

</head>

<body class="antialiased  bg-black/40">
    @yield('content')
</body>

</html>
