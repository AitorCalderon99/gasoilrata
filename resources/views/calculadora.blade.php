@extends('layouts.app')

<!--Para subir lo estilos al header y asi que se muestren bien-->
@push('head')
<script src="{{ asset('js/calculadora.js') }}"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<style>
    html * {
        font-family: "Hemi head";
        letter-spacing: 0.06rem;
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
        max-width: 25em;
        height: 10em;
        margin: auto;
        border: 1px solid #532e1c;
        border-radius: 15px 0px 15px 0px;
    }

    #textoTotal{
        font-size: 3em;
        font-weight: bold;
    }

    #cajaLTotal{
        background-color: #532e1c;
        width: 8em;
        height: 2.5em;
        border: 1px solid #532e1c;
        border-radius: 15px 0px 15px 0px;
    }

    #subir, #calcular{
        transition: 0.2s;
    }

    #subir:hover, #calcular:hover{
        color: #C5A880 !important;
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

    #error{
        color: red;
        text-align: center;
        font-size: 1rem;
    }
    #obligatorio{
        color: red;
    }
    div label, div h1{
        margin-left: 0;
    }
</style>

@endpush

@section('content')

<form class="container my-3" method="POST" action="/calculadora">
    {{-- Etiqueta obligatoria para enviar el formulario (añadir el class="form-control" a los input) --}}
    @csrf
    <h3 class="d-flex align-items-center justify-content-center text-center mb-7">
        Un buen viaje necesita de una buena planificación.
        <br>
        Con esta herramienta serás capaz de calcular el coste aproximado de
        tus viajes.
    </h3>
    <p>Los campos con * son obligatorios</p>
    <br>
    @if(!empty($guardado))
    <script>
         Swal.fire({
                toast: true,
                icon: 'success',
                title: 'General Title',
                animation: true,
                position: 'top-right',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                title: 'Signed in Successfully'
            });
    </script>
    @endif

    @if(Auth::check())
        <Vehiculo_seleccion></Vehiculo_seleccion>
    @else
        <h1 class="mx-auto">Debes iniciar sesión para guardar vehículos</h1>
    @endif

    @if(!empty($errores["vehiculo"]))
        <p id="error">Error al guardar: {{ $errores["vehiculo"] }}</p>
    @endif
    <br>
    <div class="mb-3">
        <label><span id="obligatorio">*</span> Kilometros a realizar </label>
        <div class="input-group">
            <input type="number" min="0" step="0.01" class="form-control" id="km" name="km">
            <span class="input-group-text">
                km
            </span>
        </div>
    </div>

    @if(!empty($errores["km"]))
        <p id="error">Error al guardar: {{ $errores["km"] }}</p>
    @endif

    <div class="mb-3">
        <label><span id="obligatorio">*</span>Tipo de carburante utilizado:</label>
        <select id="carburante" class="form-select" name="carburante">
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

    @if(!empty($errores["carburante"]))
        <p id="error">Error al guardar: {{ $errores["carburante"] }}</p>
    @endif

    <div class="mb-3">
        <label><span id="obligatorio">*</span> Consumo</label>
        <div class="input-group">
            <input type="number" step="0.01" min="0" class="form-control bg-white" id="consumo" name="consumo">
            <span class="input-group-text">
                L/100
            </span>
        </div>
    </div>

    @if(!empty($errores["litros"]))
        <p id="error">Error al guardar: {{ $errores["litros"] }}</p>
    @endif

    <div class="mb-3">
        <label><span id="obligatorio">*</span> Coste litro</label>
        <div class="input-group">
            <input type="text" class="form-control bg-white" readonly placeholder="Precio del combustible por litro" id="coste" name="coste"/>
        </div>
    </div>

    @if(!empty($errores["coste"]))
        <p id="error">Error al guardar: {{ $errores["coste"] }}</p>
    @endif

    <div class="mb-3">
        <label> Origen </label>
        <div class="input-group">
            <input type="text" class="form-control bg-white" placeholder="Lugar de inicio de su viaje." name="origen"/>
        </div>
    </div>

    <div class="mb-3">
        <label> Destino </label>
        <div>
            <input type="text" class="form-control bg-white" placeholder="Su destino." name="destino"/>
        </div>
    </div>

    <div class="d-flex align-items-center justify-content-center">
        <button type="button" class="mt-2 rounded-pill text-light" id="calcular">
            Calcular Precio
        </button>
    </div>

    <div class="caja-container">
        <label>Consumo:</label>
        <div id="cajaDTotal">
            <div id="cajaLTotal" class="text-light d-flex align-items-center justify-content-center">
            </div>

            <div id="textoTotal" class="d-flex align-items-center justify-content-center">
            </div>
        </div>
    </div>

    @if (Auth::check()) 
        <div class="d-flex align-items-center justify-content-center">
            <button type="submit" id="subir" class="mt-2 rounded-pill text-light">
                Guardar
            </button>
        </div>
    @endif
</form>


@endsection