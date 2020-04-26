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
        commentList: {},
        replyId: null
    },
    getters: {
        getCommentList: state => {
            return state.commentList;
        },
        getReplyId: state => {
            return state.replyId;
        }
    },
    mutations: {
        setCommentList(state, list) {
            state.commentList = list;
        },
        resetCommentList(state) {
            state.commentList = {};
        },
        setReplyId(state, id) {
            state.replyId = id;
        },
        resetReplyId(state) {
            state.replyId = null;
        }
    },
    actions: {
        setCommentList(context, list) {
            context.commit('setCommentList', list);
        },
        resetCommentList(context) {
            context.commit('resetCommentList');
        },
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
