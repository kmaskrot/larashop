<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">

    <meta name="application-name" content="{{ config('app.name') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1">
    <link rel="icon" type="image/svg+xml" href="{{ \Illuminate\Support\Facades\Vite::asset('resources/assets/logo.svg') }}">

    <title>
        {{$title . ', ' ?? ''}} {{ config('app.name') }}
    </title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="antialiased">
@yield('content')
</body>
</html>