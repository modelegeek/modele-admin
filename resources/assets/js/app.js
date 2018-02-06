import VueRouter from 'vue-router'
import {routers} from './route';
import Histories from "./Classes/Histories";
import Vuex from 'vuex'
import Main from './pages/main.vue'

/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */
require('./bootstrap');

window.Vue = require('vue');

Vue.use(VueRouter);
Vue.use(Vuex);

let router = new VueRouter({
  mode: 'history',
  routes: routers
});

const histories = new Vuex.Store({
  state: {
    histories: new Histories()
  },
  mutations: {
    addHistory (state, payload){
      state.histories.pushHistory(payload.name, payload.path)
    }
  }
})

// let histories = new Histories();

router.beforeEach((to, from, next) =>{
  if ( from.name != 'login' || to.name != 'login' ) {
    next();
  } else {
    histories.commit('addHistory', {
      name: to.name,
      path: to.fullPath
    })
  }

  // processed to next route
  next();
})

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
  el: '#admin-panel',
  render: h => h(Main),
  data: {
    currentRoute: window.location.pathname
  },
  store: histories,
  router: router
});
