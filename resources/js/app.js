/* require('./bootstrap'); */

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

/* import "./bootstrap" */
import BootstrapVue3 from 'bootstrap-vue-3'
import 'bootstrap/dist/css/bootstrap.css'
import 'bootstrap-vue-3/dist/bootstrap-vue-3.css'


import { createApp } from 'vue';
const app = createApp({});


//Aqui se añaden todos los componentes

import Cabecera from './components/Cabecera';
import Pie from './components/Pie';
import Tabla_precio from './components/Tabla_precio';
import Tarjetas_didacticas from './components/Tarjetas_didacticas';
import Grafico from './components/Grafico';

app.component('Cabecera', Cabecera);
app.component('Pie', Pie);
app.component('Tabla_precio', Tabla_precio);
app.component('Tarjetas_didacticas', Tarjetas_didacticas);
app.component('Grafico', Grafico);

app.use(BootstrapVue3);
app.mount('#app');