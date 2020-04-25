require('./bootstrap');

window.Vue = require('vue');
window.Vuex = require('vuex');

import VueRouter from "vue-router";
import routes from "./routes";

Vue.use(Vuex)
Vue.use(VueRouter);
Vue.component('app', require('./components/App').default);

const router = new VueRouter({
    mode: 'history',
    routes
});

const store = new Vuex.Store({
    state: {
        replyId: null
    },
    getters: {
        getReplyId: state => {
            return state.replyId;
        }
    },
    mutations: {
        setReplyId(state, id) {
            state.replyId = id;
        },
        resetReplyId(state) {
            state.replyId = null;
        }
    },
    actions: {
        setReplyId(context, id) {
            context.commit('setReplyId', id);
        },
        resetReplyId(context) {
            context.commit('resetReplyId');
        }
    }
});

const app = new Vue({
    el: '#app',
    router,
    store
});
