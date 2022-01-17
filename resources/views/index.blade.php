@extends('layouts.app')

@section('title', 'Pagina de Inicio')

@push('head')
    <script src="../js/chart.js"></script>
@endpush

@section('content')
<main>
    <h1>Soy la vista INDEX</h1>

    <TarjetaDidactica></TarjetaDidactica>

    <TablaPrecios></TablaPrecios>

    <div class="grafico-container">
        <canvas id="grafico" width="400" height="400"></canvas>
    </div>
</main>
@endsection