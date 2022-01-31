<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @if (Auth::check())
        <meta name="id_user" content="{{ Auth::user()->id }}" />
    @else
        <meta name="id_user" content="{{ 0 }}" />
    @endif
    <title>@yield('title')</title>
    <script src="{{ asset('js/app.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}"/>
    <link rel="stylesheet" href="{{ asset('css/header.css') }}">
    @stack('head')
</head>
<body id="app">
    <div class="wrapper">
        <header>@include('layouts.header')</header>

        @yield('content')

        <Pie></Pie>
    </div>
</body>
</html>
