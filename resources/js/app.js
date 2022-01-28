/* require('./bootstrap'); */

const axios = require('axios');


// import Alpine from 'alpinejs';
// window.Alpine = Alpine;
// Alpine.start();

/* import BootstrapVue3 */
import BootstrapVue3 from 'bootstrap-vue-3'
import 'bootstrap/dist/css/bootstrap.css'
import 'bootstrap-vue-3/dist/bootstrap-vue-3.css'

/* import VueSweetAlert2 */
import VueSweetalert2 from 'vue-sweetalert2';
import 'sweetalert2/dist/sweetalert2.min.css';

import store from "./store";

/**
 * 
 * Si no queremos poner toda la linea de codigo de
 * "window.on('load')", podemos venir aqui y comentar
 * la linea de abajo, y cambiarla por esta:
 * 
 * window.$=$;
 * 
 */
global.$ = global.jQuery = require('jquery');

import { createApp } from 'vue';
const app = createApp({});

// PROVIDES/INJECT (para mandar a todos los hijos)
app.provide("id_user", document.querySelector("meta[name='id_user']").getAttribute('content'));

//Aqui se añaden todos los componentes

// MUCHO CUIDADO A LA HORA DE NOMBRAR COMPONENTES
// Si es una palabra -> la primera en mayuscula
// Si es más de una -> separadas por _ la primera en mayuscula y las demas en minuscula

import Cabecera from './components/Cabecera';
import Pie from './components/Pie';
import Tabla_precio from './components/Tabla_precio';
import Tarjetas_didacticas from './components/Tarjetas_didacticas';
import Grafico from "./components/Grafico";
import Ranking from "./components/Ranking";
import Vehiculo_seleccion from "./components/Vehiculo_seleccion";
import Tarjetas_consumos from "./components/Tarjetas_consumos";
import Cardscopy from "./components/Cardscopy";
import Tarjetas_repostajes from "./components/Tarjetas_repostajes";
import Tarjeta_repostaje from "./components/Tarjeta_repostaje";
import { Swal } from 'sweetalert2/dist/sweetalert2';


app.component('Cardscopy', Cardscopy);
app.component('Cabecera', Cabecera);
app.component('Pie', Pie);
app.component('Tabla_precio', Tabla_precio);
app.component('Tarjetas_didacticas', Tarjetas_didacticas);
app.component('Grafico', Grafico);
app.component('Ranking', Ranking);
app.component('Vehiculo_seleccion', Vehiculo_seleccion);
app.component('Tarjetas_consumos', Tarjetas_consumos);
app.component('Tarjetas_repostajes', Tarjetas_repostajes);
app.component('Tarjeta_repostaje', Tarjeta_repostaje);

app.use(BootstrapVue3);
app.use(VueSweetalert2);
app.use(store)

window.onload = function () {
    app.mount('#app');
}