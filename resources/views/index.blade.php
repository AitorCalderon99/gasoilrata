@extends('layouts.app')

@section('title', 'Pagina de Inicio')

@push('head')
    <script src="../js/chart.js"></script>
@endpush

@section('content')
<main>

    <Tarjetas_didacticas></Tarjetas_didacticas>
    
    <Tabla_precio></Tabla_precio>

    <div class="grafico-container">
        <canvas id="grafico" width="400" height="400"></canvas>
    </div>
    
</main>
@endsection