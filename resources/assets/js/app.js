import VueRouter from 'vue-router'
import {routers} from './route';

/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */
require('./bootstrap');

window.Vue = require('vue');

Vue.use(VueRouter);

let router = new VueRouter({
  mode: 'history',
  routes: routers
});

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
Vue.component('admin-panel', require('./pages/admin-panel'));

const app = new Vue({
  el: '#admin-panel',
  data: {
    currentRoute: window.location.pathname
  },
  router: router,
});
