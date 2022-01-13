/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

import { createApp } from 'vue'
import App from './components/Header.vue'
import App2 from './components/Footer.vue'
import TarjetaDidactica from './components/TarjetaDidactica.vue'
//import router from './router'
//import axios from 'axios';
import 'bootstrap/dist/css/bootstrap.min.css'

const app =  createApp(App).mount('#app');
const app2 = createApp(App2).mount('#app2');
const tarjeta = createApp(TarjetaDidactica).mount('#slider-tarjetas');


/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

/* Vue.component('example-component', require('./components/ExampleComponent.vue').default); */

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('headeras', require('./components/Header.vue').default);
Vue.component('pie', require('./components/Footer.vue').default);
Vue.component('TarjetaDidactica', require('./components/TarjetaDidactica.vue').default);
