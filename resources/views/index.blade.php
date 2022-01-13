@extends('layouts.app')

@section('content')
<main>
    <div id="carousel-tarjetas" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#demo" data-bs-slide-to="0"></button>
            <button type="button" data-bs-target="#demo" data-bs-slide-to="1" class="active"></button>
            <button type="button" data-bs-target="#demo" data-bs-slide-to="2"></button>
        </div>

        <div class="carousel-inner">
            <div class="carousel-item ">

                <div class="alert d-block w-100">NUMERO UNO</div>
            </div>
            <div class="carousel-item active">

                <div class="alert d-block w-100">NUMERO DOS</div>
            </div>
            <div class="carousel-item">

                <div class="alert d-block w-100">NUMERO TRES</div>
            </div>
        </div>

        <button class="carousel-control-prev" type="button" data-bs-target="#demo" data-bs-slide="prev">
            <span class="carousel-control-prev-icon"></span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#demo" data-bs-slide="next">
            <span class="carousel-control-next-icon"></span>
        </button>
    </div>

    <div class="table">
        <table>
            <thead>
                <tr>
                    <th scope="col">Combustible</th>
                    <th scope="col">Hoy</th>
                    <th scope="col">Ayer</th>
                    <th scope="col">Semanal</th>
                </tr>
            </thead>

            <tbody>
                <tr>
                    <th scope="row">Gasolina 95</th>
                    <td>1.010€</td>
                    <td>1€</td>
                    <td>1.010€</td>
                </tr>
                <tr>
                    <th scope="row">Gasolina 98</th>
                    <td>1.310€</td>
                    <td>1.234€</td>
                    <td>1.010€</td>
                </tr>
                <tr>
                    <th scope="row">Diesel</th>
                    <td>0.800€</td>
                    <td>0.880€</td>
                    <td>1.010€</td>
                </tr>
            </tbody>
        </table>
    </div>

    <div class="grafico-container">
        <canvas id="grafico" width="400" height="400"></canvas>
    </div>
    <script src="../js/chart.js"></script>
</main>
@endsection