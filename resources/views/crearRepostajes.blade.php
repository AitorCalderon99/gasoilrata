@extends('layouts.app')

@section('title', 'Crear repostaje')

@push('head')
<style>
    input::-webkit-outer-spin-button,
    input::-webkit-inner-spin-button {
        -webkit-appearance: none;
        margin: 0;
    }
    
    #botones button{
        background-color: #522d1c;
        border: none;
        width: 10em;
        height: 2em;
    }
</style>
@endpush

@section('content')
<main>

    <form class="container my-3" method="POST" action="/calculadora">
        @csrf
        <div class="mb-3">
            <label> Gasolinera </label>
            <input type="text" min="0" class="form-control" id="gasolinera" name="gasolinera">
        </div>

        <div class="mb-3">
            <label> Combustile </label>
            <input type="number" min="0" class="form-control" id="combustible" name="combustible">
        </div>

        <div class="mb-3">
            <label> Litros </label>
            <div class="input-group">
                <input type="number" min="0" class="form-control bg-white" id="litros" name="litros">
                <span class="input-group-text">
                    L
                </span>
            </div>
        </div>

        <div class="mb-3">
            <label> Fecha </label>
            <input type="date" min="0" class="form-control" id="fecha" name="fecha">
        </div>

        <div class="mb-3">
            <label> Coste por litro </label>
            <div class="input-group">
                <input type="number" min="0" class="form-control bg-white" id="coste-litros" name="coste-litros">
                <span class="input-group-text">
                    €/L
                </span>
            </div>
        </div>

        <div class="mb-3">
            <label> Coste total </label>
            <div class="input-group">
                <input type="number" min="0" class="form-control bg-white" id="total" name="total">
                <span class="input-group-text">
                    €
                </span>
            </div>
        </div>

        <div class="d-flex align-items-center justify-content-center" id="botones">
            <button type="button" href="../repostajes" class="mt-2 rounded-pill text-light">Volver</button>
            <button type="submit" href="" class="mt-2 ml-3 rounded-pill text-light">Guardar</button>
        </div>
    </form>

</main>
@endsection