/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

global.$ = global.jQuery = require('jquery');

import BootstrapVue3 from 'bootstrap-vue-3';
import 'bootstrap/dist/css/bootstrap.css';
import 'bootstrap-vue-3/dist/bootstrap-vue-3.css';

import { createApp } from 'vue';
const app = createApp({});
import Header from './components/Header.vue';
import Footer from './components/Footer.vue';
import TarjetaDidactica from './components/TarjetaDidactica.vue';
import TablaPrecios from './components/TarjetaDidactica.vue';

app.component('Header', Header);
app.component('Footer', Footer);
app.component('TarjetaDidactica', TarjetaDidactica);
app.component('TablaPrecios', TablaPrecios);
app.use(BootstrapVue3);
app.mount('#app');


