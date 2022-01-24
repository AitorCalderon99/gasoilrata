@extends('layouts.app')

<!--Para subir lo estilos al header y asi que se muestren bien-->
@push('head')
<script src="{{ asset('js/calculadora.js') }}"></script>
<style>
    html * {
        font-family: "Hemi head";
    }

    input::-webkit-outer-spin-button,
    input::-webkit-inner-spin-button {
        -webkit-appearance: none;
        margin: 0;
    }

    button[type=submit], #calcular{
        background-color: #522d1c;
        border: none;
        width: 10em;
        height: 2em;
    }

    #cajaDTotal{
        background-color: #c5a880;
        width: 20em;
        height: 10em;
        border: 1px solid #532e1c;
        border-radius: 15px 0px 15px 0px;
    }

    #textoTotal{
        font-size: 4.5em;
        font-weight: bold;
    }

    #cajaLTotal{
        background-color: #532e1c;
        width: 8em;
        height: 2.5em;
        padding-top: 0.5em;
        border: 1px solid #532e1c;
        border-radius: 15px 0px 15px 0px;
    }

    /*Para que al calcular el precio se "desactiven" los campos de textos*/
    .desaparecer{
        background-color: white !important;
        color: #b8b7b7 !important;
        border: solid 1px #b8b7b7 !important;
    }

    .desaparecer:hover{
        cursor: wait;
    }

    .esperar{
        color: #b8b7b7 !important;
    }

    .esperar:hover{
        cursor: wait;
    }

    .multiple:hover{
        cursor: wait;
    }

    .calculo:hover{
        cursor: wait;
    }

    .subirHov:hover{
        cursor: not-allowed;
    }
</style>

@endpush

@section('content')
<form class="container my-3" method="POST" action="contacto">
    <h3 class="d-flex align-items-center justify-content-center text-center mb-7">
        Un buen viaje necesita de una buena planificación.
        <br>
        Con esta herramienta serás capaz de calcular el coste aproximado de
        tus viajes.
    </h3>

    <div class="mb-3">
        <label>Vehículo a utilizar: (CARGAR DATOS DEL CLIENTE)</label>
        <select id="vehiculo">
            
        </select>
    </div>

    <div class="mb-3">
        <label> Kilometros a realizar </label>
        <div class="input-group">
            <input type="number" min="0" class="form-control" value="23" id="km">
            <span class="input-group-text">
                km
            </span>
        </div>
    </div>

    <div class="mb-3">
        <label>Tipo de carburante utilizado:</label>
        <select id="carburante" class="form-select">
            <option selected disabled>Seleccione el carburante</option>
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
        <label> Consumo </label>
        <div class="input-group">
            <input type="number" min="0" class="form-control bg-white" id="consumo">
            <span class="input-group-text">
                L/100
            </span>
        </div>
    </div>

    <div class="mb-3">
        <label> Coste litro </label>
        <div class="input-group">
            <input type="text" class="form-control bg-white" readonly placeholder="Precio del combustible por litro" id="coste"/>
        </div>
    </div>

    <div class="mb-3">
        <label> Origen </label>
        <div class="input-group">
            <input type="text" class="form-control bg-white" placeholder="Usa la insertada por el usuario. Se puede cambiar."/>
        </div>
    </div>

    <div class="mb-3">
        <label> Destino </label>
        <div>
            <input type="text" class="form-control bg-white" placeholder="Lugar"/>
        </div>
    </div>

    <div class="d-flex align-items-center justify-content-center">
        <button type="button" class="mt-2 rounded-pill text-light" id="calcular">
            Calcular Precio
        </button>
    </div>

    <div>
        <label>Consumo:</label>
        <div id="cajaDTotal">
            <div id="cajaLTotal" class="text-light d-flex align-items-center justify-content-center">
                {{-- <h2>32.65L</h2> --}}
            </div>

            <div id="textoTotal" class="d-flex align-items-center justify-content-center">
                {{-- <p id="resultado"></p> --}}
            </div>
        </div>
    </div>

    <div class="d-flex align-items-center justify-content-center">
        <button type="submit" id="subir" class="mt-2 rounded-pill text-light">
            Guardar
        </button>
    </div>
</form>


@endsection