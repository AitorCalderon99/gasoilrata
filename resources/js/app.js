/* require('./bootstrap'); */

import Alpine from 'alpinejs';
const axios = require('axios');


window.Alpine = Alpine;

Alpine.start();

/* import "./bootstrap" */
import BootstrapVue3 from 'bootstrap-vue-3'
import 'bootstrap/dist/css/bootstrap.css'
import 'bootstrap-vue-3/dist/bootstrap-vue-3.css'

global.$ = global.jQuery = require('jquery');


import { createApp } from 'vue';
const app = createApp({});


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

app.component('Cabecera', Cabecera);
app.component('Pie', Pie);
app.component('Tabla_precio', Tabla_precio);
app.component('Tarjetas_didacticas', Tarjetas_didacticas);
app.component('Grafico', Grafico);
app.component('Ranking', Ranking);
app.component('Vehiculo_seleccion', Vehiculo_seleccion);
app.component('Tarjetas_consumos', Tarjetas_consumos);

app.use(BootstrapVue3);
app.mount('#app');