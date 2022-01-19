<template>
    <div class="container">
        <div class="head-text">
            <p>¡Encuentra las gasolineras cercanas con los precios más baratos!</p>
        </div>
        <br/>
        <div class="foptions">
            <select class="selectComb form-select" aria-label="Default select example">
                <option selected>Seleccione el tipo de combustible</option>
            </select>
            <select class="selectMun form-select" aria-label="Default select example">
                <option selected>Seleccione el municipio</option>
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

//AXIOS (Ranking)
axios
    .get('https://sedeaplicaciones.minetur.gob.es/ServiciosRESTCarburantes/PreciosCarburantes/EstacionesTerrestres/')
    .then(response => {
        //Carburantes
        var combustibles = getCarburantes(response.data.ListaEESSPrecio[0]);

        for (let i = 0; i < combustibles.length; i++) {
            setCarburantes(combustibles[i]);
        }

        //Municipios
        var municipios = getMunicipios(response.data.ListaEESSPrecio);

        for (let i = 0; i < municipios.length; i++) {
            setMunicipios(municipios[i]);
        }
    })
    .catch(error => console.log(error));

//Functions
function getCarburantes(axiosResponse) {
    const reg = /Precio*/;
    var combustibles = [];
    for (const regKey in axiosResponse) {
        if (axiosResponse.hasOwnProperty(regKey)) {
            if (regKey.match(reg))
                combustibles.push(regKey.split("Precio ")[1]);
        }
    }
    return combustibles;
}

function setCarburantes(nombreCombustible) {
    $(".selectComb").append($('<option>', {
        value: nombreCombustible,
        text: nombreCombustible
    }));
}

function getMunicipios(axiosResponse) {
    var municipios = [];
    for (let i = 0; i < axiosResponse.length; i++) {
        municipios.push(axiosResponse[i]["Municipio"])
    }

    //Borrar duplicados
    const municipiosSinDuplicados = new Set(municipios);
    return [...municipiosSinDuplicados];
}

function setMunicipios(municipio) {
    $(".selectMun").append($('<option>', {
        value: municipio,
        text: municipio
    }));
}

</script>

<style scoped>

</style>
