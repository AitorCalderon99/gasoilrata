@extends('layouts.app')

@section('title', 'Mis repostajes')

@push('head')

@endpush

@section('content')
<main>
    <div class="crear-repostaje">
        <h1 class="text-center mt-4 mb-3">¿Quieres crear un nuevo repostaje?</h1>
        <div class="d-flex align-items-center justify-content-center">
            <a class="btn btn-primary" href="crearRepostajes">
                Crear
            </a>
        </div>
    </div>

    <h1 class="text-center mt-5 mb-3">¡Revisa el historial de repostajes para ahorrarte un dinerito!</h1>

    <Vehiculo_seleccion></Vehiculo_seleccion>

    <Tarjetas_repostajes></Tarjetas_repostajes>
</main>
@endsection
