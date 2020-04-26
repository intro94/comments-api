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
        },
        addCommentGroup(state, groupId) {
            state.commentList[groupId] = [];
        },
        addCommentToList(state, payload) {
            state.commentList[payload.groupId].push(payload.commentItem);
        },
        updateComment(state, payload) {
            state.commentList[payload.groupId][payload.index] = payload.commentItem;
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
        },
        addCommentToList(context, payload) {
            if (!context.getters.getCommentList[payload.groupId])
                context.commit('addCommentGroup', payload.groupId);

            context.commit('addCommentToList', {
                groupId: payload.groupId,
                commentItem: payload.commentItem
            });
        },
        updateComment(context, payload) {
            context.commit('updateComment', payload);
        }
    }
});

const app = new Vue({
    el: '#app',
    router,
    store
});
