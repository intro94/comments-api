require('./bootstrap');

window.Vue = require('vue');

import VueRouter from "vue-router";
import routes from "./routes";

Vue.use(VueRouter);
Vue.component('app', require('./components/App').default);

const router = new VueRouter({
    mode: 'history',
    routes
});

const app = new Vue({
    el: '#app',
    router
});
