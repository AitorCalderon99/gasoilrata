@extends('layouts.app')

@section('title','Mis consumos')

<!--Para subir lo estilos al header y asi que se muestren bien-->
@push('head')
    
@endpush

@section('content')

    <main>
        <h3>¡WOW, qué cantidad de dinero que has ahorrado utilizando la calculadora de consumo!</h3>

        <Vehiculo_seleccion></Vehiculo_seleccion>

        <Tarjetas_consumos></Tarjetas_consumos>
    </main>

@endsection