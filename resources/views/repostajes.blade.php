@extends('layouts.app')

@section('title', 'Mis repostajes')

@push('head')
    <style>
        html * {
            letter-spacing: 0.06rem;
        }
    </style>
@endpush

@section('content')
<main>

    <div class="crear-repostaje text-center">
        <h1>¿Quieres crear un nuevo repostaje?</h1>
        <a class="btn btn-primary mx-auto" href="crearRepostajes">Crear</a>
    </div>

    <h1 class="text-center mb-2">¡Revisa el historial de repostajes para ahorrarte un dinerito!</h1>

    @if(Auth::check())
        <Vehiculo_seleccion></Vehiculo_seleccion>
    @else
        <h1 class="mx-auto">Debes iniciar sesión para guardar vehículos</h1>
    @endif

    <Tarjetas_repostajes @cambioVehiculo="getVehiculo($event)"></Tarjetas_repostajes>
</main>
@endsection
