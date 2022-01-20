<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/header.css') }}">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <title>@yield('title')</title>
    <style>
        /*Para especificar el tipo de letra que queremos*/
        @font-face{
            /*El nombre con el que vamos a llamar a la clase*/
            font-family: "Hemi head";
            /*El enlace de donde sale el tipo de letra*/
            src: url("https://www.dafont.com/hemi-head.font");
        }
    </style>
    @stack('head')
</head>
<body>
    <div id="app">
        @include('layouts.header')
        
        @yield('content')
        
        <Pie></Pie>
    </div>
    
    <script src="{{ asset('js/app.js') }}"></script>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet"/>
</body>
</html>
