@extends('layouts.app')

@section('title', 'Pagina de Inicio')

<!--Para subir lo estilos al header y asi que se muestren bien-->
@push('head')
    <style>
        html * {
            letter-spacing: 0.06rem;
        }
    </style>
@endpush

@section('content')
<main>

    <Tarjetas_didacticas></Tarjetas_didacticas>
    
    <Tabla_precio></Tabla_precio>

    <Grafico></Grafico>
    
</main>
@endsection