@extends('layouts.app')

@section('title', 'Pagina de Inicio')

<!--Para subir lo estilos al header y asi que se muestren bien-->
@push('head')
    
@endpush

@section('content')
<main>

    <Tarjetas_didacticas></Tarjetas_didacticas>
    
    <Tabla_precio></Tabla_precio>

    <Grafico></Grafico>
    
</main>
@endsection