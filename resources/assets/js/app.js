import Main from './pages/main.vue'
import store from './state'
import {routeConfig} from './routes/config'

/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */
require('./bootstrap');

window.Vue = require('vue');

store.commit('authorize/init');


axios.interceptors.response.use(function (response) {
  return response;
}, function (error) {

  const originalRequest = error.config;
  const errorResponse = error.response.data;

  if ( error.response.status === 401 && (errorResponse.message && errorResponse.message == 'Unauthenticated.') ) {

    const refreshToken = store.getters['authorize/refreshToken'];

    let data = {}
    data.grant_type = 'refresh_token';
    data.refresh_token = refreshToken;
    data.client_id = 1;
    data.client_secret = 'MmLOYjh4Xv9pMhCoO6jjexzNL75SCEq36URmFjoj';
    data.scope = null;

    return axios.post('/oauth/token', data)
                .then(({ data }) => {
                  store.dispatch('authorize/update', data);
                  originalRequest.headers['Authorization'] = 'Bearer ' + data.access_token;
                  return axios(originalRequest);
                })
  }
  return Promise.reject(error);
});

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
  store: store,
  router: routeConfig
});
