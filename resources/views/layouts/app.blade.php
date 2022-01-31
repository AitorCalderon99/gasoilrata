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
    <link rel="stylesheet" href="{{ asset('css/header.css') }}">
    <!--La unica manera en la que se me ha ocurrido ponerlo para que funcionase-->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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
<body id="app">

        @include('layouts.header')
        
        @yield('content')

        <Pie></Pie>
    
    <script src="{{ asset('js/app.js') }}"></script>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet"/>
</body>
</html>
