@extends('layouts.app')

<!--Para subir lo estilos al header y asi que se muestren bien-->
@push('head')
<style>
    #mapa {
        width: 100%;
        height: 20%;
    }

    .logos {
        width: 2rem;
    }
    
    #horario {
        border: 1px solid black;
        border-radius: 5px;
        padding: 0.5em;
        margin-left: 2.5em;
        margin-right: 2em;
    }

    #carretera {
        height: 20em;
        width: auto;
        margin-left: auto;
        margin-right: auto;
    }

    #cajaTarjeta {
        background-color: transparent;
        width: 220px;
        height: 300px;
        border: 1px solid #eeeeee;
        perspective: 1000px;
    }

    #tarjeta {
        position: relative;
        width: 100%;
        height: 100%;
        text-align: center;
        transition: transform 0.4s;
        transform-style: preserve-3d;
    }

    #cajaTarjeta:hover #tarjeta {
        transform: rotateX(180deg);
    }

    #pregunta, #respuesta {
        position: absolute;
        width: 100%;
        height: 100%;
        backface-visibility: hidden;
    }

    #pregunta {
        background-color: #cccccc;
        color: #111111;
    }

    #respuesta {
        background-color: #8ebf42;
        color: #eeeeee;
        transform: rotateX(180deg);
    }
</style>
@endpush

@section('content')
<div id="main">
    <!-- mapa -->
    <iframe id="mapa" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2905.701793571246!2d-2.9045955845150373!3d43.25767127913678!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd4e4fac87437727%3A0x364f27e82def0130!2sCIFP%20Txurdinaga%20LHII!5e0!3m2!1ses!2ses!4v1642074299000!5m2!1ses!2ses" 
        allowfullscreen="" loading="lazy"></iframe>

    <section class="row d-flex align-items-center justify-content-center m-4">
        <article class="col-md-6 col-xl-6">
            <div class="d-flex">
                <img class="logos mx-4" src="img/mailLogo.png"/>
                idazkaria@fpTXurdinaga.com
            </div>

            <div class="d-flex my-3">
                <img class="logos mx-4" src="img/TxLogo.png"/>
                C/ Doctor Ornilla 2, 48004 BILBAO
            </div>

            <div>
                <p class="d-flex mb-2">
                    <img class="logos mx-4" src="img/casaLogo.png"/>
                    Horario:
                </p>
        
                <ul id="horario" class="list-unstyled">
                    <li class="fs-6">Lunes: 9:00 - 15:00</li>
                    <li class="fs-6">Miércoles: 9:00 - 18:30</li>
                    <li class="fs-6">Martes, jueves y viernes: 9:00 - 14:00</li>
                </ul>                
            </div>

            <div class="d-flex mt-3">
                <img class="logos mx-4" src="img/telefonoLogo.png"/>
                944 125 712                
            </div>
        </article>

        <article class="col-md-6 col-xl-6">
            <img id="carretera" src="img/carretera.png">
        </article>
    </section>

    <div id="cajaTarjeta">
        <div id="tarjeta">
            <div id="pregunta">
                <h2>He aqui la pregunta</h2>
            </div>

            <div id="respuesta">
                <h2>Y la respuesta</h2>
            </div>
        </div>
    </div>
</div>
@endsection

  
