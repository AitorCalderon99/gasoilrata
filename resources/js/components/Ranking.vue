<template>
    <div class="container">
        <div class="head-text">
            <p>¡Encuentra las gasolineras cercanas con los precios más baratos!</p>
        </div>
        <br/>
        <div class="foptions">
            <select class="form-select" aria-label="Default select example">
                <option selected>Seleccione el tipo de combustible</option>
                <option value="1">One</option>
                <option value="2">Two</option>
                <option value="3">Three</option>
            </select>
            <select class="form-select" aria-label="Default select example">
                <option selected>Seleccione el municipio</option>
                <option value="1">One</option>
                <option value="2">Two</option>
                <option value="3">Three</option>
            </select>
        </div>
        <button type="button" class="btn btn-532E1C">Precio &nbsp;<i class="bi bi-arrow-down-short"></i></button>
    </div>
</template>

<script>
import axios from "axios";

export default {
    name: "Ranking"
}
var listado = "";
axios
    .get('https://sedeaplicaciones.minetur.gob.es/ServiciosRESTCarburantes/PreciosCarburantes/EstacionesTerrestres/')
    .then(response => {
        //console.log(response.data.ListaEESSPrecio[0].test(/Precio*/));
        var reg = /Precio*/;
        console.log(response.data.ListaEESSPrecio[0]);
        for (const regKey in response.data.ListaEESSPrecio[1]) {
           if (regKey.match(reg))
               console.log(regKey.split("Precio ")[1]);
        }



        //response.data.ListaEESSPrecio[0].forEach


        listado = response.data.ListaEESSPrecio;
    })
    .catch(error => console.log(error));
</script>

<style scoped>

</style>
