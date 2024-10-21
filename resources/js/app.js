/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue').default;

Vue.prototype.can = function(value){
    return window.Laravel.jsPermissions.permissions.includes(value);
}
Vue.prototype.is = function(value){
    return window.Laravel.jsPermissions.roles.includes(value);
}


/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('App', require('./components/App.vue').default);
Vue.component('Auth', require('./components/Auth').default);
//import App from './components/App.vue';
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

/* const app = new Vue({
    el: '#app',
}); */



//Importamos Axios
import VueAxios from 'vue-axios';
import axios from 'axios';

//Importamos y configuramos el Vue-router
import VueRouter from 'vue-router';
import {routes} from './routes';

import vSelect from 'vue-select'

Vue.use(VueRouter); 
//Vue.use(axios);
Vue.use(VueAxios, axios);

Vue.component('v-select', vSelect)
import 'vue-select/dist/vue-select.css';

const router = new VueRouter({
    mode: 'history',
    base: '/ciis6/public/',
    //base: '',
    //fallback:true,
    routes: routes
});


const app = new Vue({
    el: '#kt_app_root',
    router: router,
    //render: h => h(App),
});
