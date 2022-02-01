@extends('layouts.app')

@section('title', 'Crear repostaje')

@push('head')
<script src="{{ asset('js/calculadora.js') }}"></script>
    <style>
        html *{
            letter-spacing: 0.06rem;
        }
        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

        #botones button {
            background-color: #522d1c;
            border: none;
            width: 10em;
            height: 2em;
        }
        h1{
            font-size: calc(.7rem + 1vw) !important;

        }
    </style>
@endpush

@section('content')
    <main>
        <form class="container my-3 mb-3" method="POST" action="">
            <div class="row">
                <div class="col">
                    <h1 class="d-flex justify-content-center pt-2 pb-2">Inserte los datos necesarios del repostaje.</h1>
                </div>
            </div>

            @csrf
            <div class="mb-3">
                <label> Gasolinera </label>
                <input type="text" min="0" class="form-control" id="gasolinera" name="gasolinera">
            </div>

            <!--Le especificamos donde va a dar esos errores-->
            @if(!empty($errores["gasolinera"]))
                <p id="error">
                    Error al insertar: {{ $errores["gasolinera"] }}
                </p>
            @endif

            <div class="mb-3">
                <label> Combustible </label>
                <select id="carburante" class="form-select" name="carburante">
                    <option selected disabled>Tipo de combustible</option>
                    <option value="Biodiesel">Biodiesel</option>
                    <option value="Bioetanol">Bioetanol</option>
                    <option value="GasNaturalComprimido">Gas Natural Comprimido</option>
                    <option value="GasNaturalLicuado">Gas Natural Licuado</option>
                    <option value="Gaseslicuadosdelpetroleo">Gases licuados del petróleo</option>
                    <option value="GasoleoA">Gasoleo A</option>
                    <option value="GasoleoB">Gasoleo B</option>
                    <option value="GasoleoPremium">Gasoleo Premium</option>
                    <option value="Gasolina95E10">Gasolina 95 E10</option>
                    <option value="Gasolina95E5">Gasolina 95 E5</option>
                    <option value="Gasolina95E5Premium">Gasolina 95 E5 Premium</option>
                    <option value="Gasolina98E10">Gasolina 98 E10</option>
                    <option value="Gasolina98E5">Gasolina 98 E5</option>
                    <option value="Hidrogeno">Hidrogeno</option>
                </select>
            </div>

            <div class="mb-3">
                <label> Litros </label>
                <div class="input-group">
                    <input type="number" step="0.01" min="0" class="form-control bg-white" id="litros" name="litros">
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
                    <input type="text" class="form-control bg-white" readonly placeholder="Precio del combustible por litro" id="coste" name="coste"/>
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

            <div class="row d-flex align-items-center justify-content-center mb-7" id="botones">
                <div class="col d-flex align-items-center justify-content-center">
                    <a href="repostajes">
                        <button type="button" class="mt-2 rounded-pill text-light">Volver</button>
                    </a>
                </div>
                <div class="col d-flex align-items-center justify-content-center">
                    <button type="submit" class="mt-2 rounded-pill text-light">Guardar</button>
                </div>

            </div>
        </form>

    </main>
@endsection
