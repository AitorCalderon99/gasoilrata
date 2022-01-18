@extends('layouts.app')

@section('content')
<form class="container my-3" method="POST" action="contacto">
    <h3 class="d-flex align-items-center justify-content-center text-center">
        Un buen viaje necesita de una buena planificación.
        <br>
        Con esta herramienta serás capaz de calcular el coste aproximado de
        tus viajes.
    </h3>

    <div class="mb-3">
        <label> Kilometros a realizar </label>
        <div class="input-group">
            <input type="number" min="0" class="form-control">
            <span class="input-group-text">
                km
            </span>
        </div>
    </div>

    <div class="mb-3">
        <label> Consumo </label>
        <div class="input-group">
            <input type="number" min="0" class="form-control">
            <span class="input-group-text">
                L/100
            </span>
        </div>
    </div>

    <div class="mb-3">
        <label> Coste litro </label>
        <div class="input-group">
            <input type="text" class="form-control" placeholder="Coste calculable mediante JS."/>
        </div>
    </div>

    <div class="mb-3">
        <label> Origen </label>
        <div class="input-group">
            <input type="text" class="form-control" placeholder="Usa la insertada por el usuario. Se puede cambiar."/>
        </div>
    </div>

    <div class="mb-3">
        <label> Destino </label>
        <div>
            <input type="text" class="form-control" placeholder="Lugar"/>
        </div>
    </div>

    <div class="d-flex align-items-center justify-content-center">
        <button type="submit" class="Botones mt-2 rounded-pill text-light">
            Calcular Precio
        </button>
    </div>

    <div>
        <label>Consumo:</label>
        <div id="cajaDTotal">
            <div id="cajaLTotal" class="text-light d-flex align-items-center justify-content-center">
                <h2>32.65L</h2>
            </div>

            <div id="textoTotal" class="d-flex align-items-center justify-content-center">
                <p>76,45€</p>
            </div>
        </div>
    </div>

    <div class="d-flex align-items-center justify-content-center">
        <button type="submit" class="Botones mt-2 rounded-pill text-light">
            Guardar
        </button>
    </div>
</form>

<style>
    html * {
        font-family: "Roboto";
    }

    input::-webkit-outer-spin-button,
    input::-webkit-inner-spin-button {
        -webkit-appearance: none;
        margin: 0;
    }

    .Botones {
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
</style>
@endsection