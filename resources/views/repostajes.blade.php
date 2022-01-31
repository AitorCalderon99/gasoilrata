@extends('layouts.app')

@section('title', 'Mis repostajes')

@push('head')
    
@endpush

@section('content')
<main>

    <div class="crear-repostaje">
        <h1>¿Quieres crear un nuevo repostaje?</h1>
        <a class="btn btn-primary" href="/repostajes/create">Crear</a>
    </div>

    <h1>¡Revisa el historial de repostajes para ahorrarte un dinerito!</h1>

    <Vehiculo_seleccion></Vehiculo_seleccion>

    <Tarjetas_repostajes></Tarjetas_respostajes>
    
</main>
@endsection