@extends('layouts.app')

<!--Para subir lo estilos al header y asi que se muestren bien-->
@push('head')
    
@endpush

@section('content')

    <div id="main">
        <h3>WOW! que cantidad de dinero has ahorrado utilizando la calculadora de consumo</h3>

        <h2>SELECCIONE VEHÍCULO</h2>
        <select>

            <option value="prueba1">prueba1</option>
            <option value="prueba1">prueba2</option>
            <option value="prueba1">prueba3</option>

        </select>
    </div>

@endsection