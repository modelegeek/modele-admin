import VueRouter from 'vue-router'
import {routers} from './route';
import Histories from "./Classes/Histories";
import Vuex from 'vuex'
import Main from './pages/main.vue'
import JwtToken from "./classes/JwtToken";

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

const histories = {
  namespaced: true,
  state: {
    histories: new Histories()
  },
  mutations: {
    add (state, payload){
      state.histories.pushHistory(payload.name, payload.path)
    }
  },
  getters: {
    list: state => {
      return state.histories.histories;
    }
  }
};

const jwt = {
  namespaced: true,
  state: {
    token: new JwtToken()
  },
  mutations: {
    update (state, payload){
      state.token.update(payload.token)
    },
    destroy (state){
      state.token.destroy()
    }
  },
  getters: {
    token: state => {
      return state.token.token;
    }
  }
};

const store = new Vuex.Store({
  modules: {
    histories: histories,
    jwt: jwt
  }
})

// let histories = new Histories();
router.beforeEach((to, from, next) =>{
  NProgress.start();

  let jwtToken = store.getters['jwt/token'];
  // middleware checking
  if ( to.matched.some(record => record.meta.requiresAuth) ) {
    // this route requires auth, check if logged in
    // if not, redirect to login page.
    if ( jwtToken == null ) {
      next({ name: 'login', })
    } else {
      next()
    }
  } else {
    next() // make sure to always call next()!
  }

  if ( jwtToken && to.name == 'login' ) {
    next({ name: 'dashboard', })
  }

  if ( to.name != 'login' ) {
    store.commit('histories/add', {
      name: to.name,
      path: to.fullPath
    })
  }

  //
  // // processed to next route
  // next();
})

router.afterEach((to) =>{
  NProgress.done()
  window.scrollTo(0, 0);
});

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

  // progressbar.js@1.0.0 version is used
  // Docs: http://progressbarjs.readthedocs.org/en/1.0.0/

const app = new Vue({
    el: '#admin-panel',
    render: h => h(Main),
    data: {
      currentRoute: window.location.pathname
    },
    store: store,
    router: router
  });
