@extends('layouts.app')

@section('title','Mis consumos')

<!--Para subir lo estilos al header y asi que se muestren bien-->
@push('head')
    <style>
        html *{
            letter-spacing: 0.06rem;
        }
    </style>
@endpush

@section('content')

    <main>
        <h3 class="my-4 text-center">¡WOW, qué cantidad de dinero que has ahorrado utilizando la calculadora de consumo!</h3>

        @if(Auth::check())
            <Vehiculo_seleccion></Vehiculo_seleccion>
        @else
            <h1 class="mx-auto">Debes iniciar sesión para guardar vehículos</h1>
        @endif

        <Tarjetas_consumos></Tarjetas_consumos>
    </main>

@endsection