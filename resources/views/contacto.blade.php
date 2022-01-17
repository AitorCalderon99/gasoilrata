@extends('layouts.app')
@section('content')

<div id="main">
    <!-- mapa -->
    <iframe id="mapa"
        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2905.701793571246!2d-2.9045955845150373!3d43.25767127913678!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd4e4fac87437727%3A0x364f27e82def0130!2sCIFP%20Txurdinaga%20LHII!5e0!3m2!1ses!2ses!4v1642074299000!5m2!1ses!2ses"
        allowfullscreen="" loading="lazy"></iframe>

    <div>
        <p class="fs-6">
            <br>
            <img class="logos" src="img/mailLogo.png">
            idazkaria@fpTXurdinaga.com
        </p>
    </div>
    <div class="mb-5">
        <p class="fs-6 d-inline-block">
            <img class="logos" src="img/TxLogo.png">
            C/ Doctor Ornilla 2, 48004 BILBAO
        </p>
        <img class="" id="carretera" src="img/carretera.png">
    </div>


    <div class="d-flex align-items-left justify-content-left">
<!--        <img src="img/mecanico.png" id="mecanico">
        <div>-->
            <p class="fs-6">
                <img class="logos" src="img/casaLogo.png">
                Horario:
            </p>

            <ul id="horario" class="list-unstyled">
                <li class="fs-6">Lunes: 9:00 - 15:00</li>
                <li class="fs-6">Miércoles: 9:00 - 18:30</li>
                <li class="fs-6">Martes, jueves y viernes: 9:00 - 14:00</li>
            </ul>


        <div class="">
            <img src="img/mecanico.png" id="mecanico" class="d-inline-block">
            <div class="d-inline-block">
                <p class="fs-6">
                    <img class="logos" src="img/casaLogo.png">
                    Horario:
                </p>
                <div id="">
                    <p class="fs-6">Lunes: 9:00 - 15:00</p>
                    <p class="fs-6">Miércoles: 9:00 - 18:30</p>
                    <p class="fs-6">Martes, jueves y viernes: 9:00 - 14:00</p>
                </div>
                <p class="fs-4">
                <img class="logos" src="img/telefonoLogo.png">
                944 125 712
                </p>
            </div>
        </div>
    <p class="fs-4">
        <img class="logos" src="img/telefonoLogo.png">
        944 125 712
    </p>
    </div>

<style>
    #mapa {
        width: 100%;
        height: 20%;
    }

    .logos {
        width: 2rem;
    }

    #horario{
        border: 1px solid black;
        border-radius: 5px;
        padding: 0.5em;
        margin-left: 2.5em;
    }
</style>
@endsection
