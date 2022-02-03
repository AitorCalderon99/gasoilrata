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

    <div class="ratio ratio-16x9">
        <iframe src="https://www.youtube.com/embed/68wpNyFHNHc" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
    </div>
    
</main>
@endsection