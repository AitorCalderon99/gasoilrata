@extends('layout.app')

@section('main')
<main>
    <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <TarjetaDidactica src="..." class="d-block w-100" alt="..."></TarjetaDidactica>
            </div>
            <div class="carousel-item">
                <TarjetaDidactica src="..." class="d-block w-100" alt="..."></TarjetaDidactica>
            </div>
            <div class="carousel-item">
                <TarjetaDidactica src="..." class="d-block w-100" alt="..."></TarjetaDidactica>
            </div>
        </div>
    </div>

    <div class="table">
        <table>
            <thead>
                <tr>
                    <th>Combustible</th>
                    <th>Hoy</th>
                    <th>Ayer</th>
                    <th>Semanal</th>
                </tr>
            </thead>

            <tbody>
                <tr>
                    <td>Gasolina 95</td>
                    <td>1.010€</td>
                    <td>1€</td>
                    <td>1.010€</td>
                </tr>
                <tr>
                    <td>Gasolina 98</td>
                    <td>1.310€</td>
                    <td>1.234€</td>
                    <td>1.010€</td>
                </tr>
                <tr>
                    <td>Diesel</td>
                    <td>0.800€</td>
                    <td>0.880€</td>
                    <td>1.010€</td>
                </tr>
            </tbody>
        </table>
    </div>

    <div class="grafico">
        <canvas id="grafico"></canvas>
    </div>
</main>
@endsection
