<template>
    <table class="table table-hover table-responsive mt-5">
        <thead>
            <tr>
                <th scope="col">Combustible</th>
                <th scope="col">Hoy</th>
                <!-- <th scope="col">Ayer</th>
                <th scope="col">Semanal</th> -->
            </tr>
        </thead>

        <tbody>
            <tr>
                <th scope="row">Gasolina 95</th>
                <td>{{g95}}</td>
                <!-- <td>1€</td>
                <td>1.010€</td> -->
            </tr>
            <tr>
                <th scope="row">Gasolina 98</th>
                <td>{{g98}}</td>
                <!-- <td>1.234€</td>
                <td>1.010€</td> -->
            </tr>
            <tr>
                <th scope="row">Diesel</th>
                <td>{{diesel}}</td>
               <!--  <td>0.880€</td>
                <td>1.010€</td> -->
            </tr>
        </tbody>
    </table>
</template>
<script>
export default {
    props: ['g95', 'g98', 'diesel']
}
</script>