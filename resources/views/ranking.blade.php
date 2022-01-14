@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="head-text">
            <p>¡Encuentra las gasolineras cercanas con los precios más baratos!</p>
        </div>
        <div class="foptions">
            <select class="form-select" aria-label="Default select example">
                <option selected>Seleccione el tipo de combustible</option>
                <option value="1">One</option>
                <option value="2">Two</option>
                <option value="3">Three</option>
            </select>
            <select class="form-select" aria-label="Default select example">
                <option selected>Seleccione el municipio</option>
                <option value="1">One</option>
                <option value="2">Two</option>
                <option value="3">Three</option>
            </select>
        </div>
        <button type="button" class="btn btn-532E1C">Precio <i class="bi bi-chevron-down"></i></button>
    </div>
    <link href="{{ asset('css/ranking.css') }}" rel="stylesheet"/>
    @stack('style')
@endsection
