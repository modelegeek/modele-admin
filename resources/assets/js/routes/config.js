import VueRouter from 'vue-router'
import {routes} from './routes';
import store from "../state";
import Vue from 'vue'

Vue.use(VueRouter);

let router = new VueRouter({
  mode: 'history',
  routes: routes
});

router.beforeEach((to, from, next) =>{
  NProgress.start();

  // middleware checking
  let jwtToken = store.getters['authorize/token'];
  if ( to.matched.some(record => record.meta.requiresAuth) ) {
    // this route requires auth, check if logged in
    // if not, redirect to login page.
    if ( jwtToken == null ) {
      next({ name: 'login', })
    }

    next();
  } else {
    next(); // make sure to always call next()!
  }

  if ( jwtToken && to.name == 'login' ) {
    next({ name: 'dashboard', })
  }

  if ( to.name != 'login' ) {
    store.dispatch('histories/add', {
      name: to.name,
      path: to.fullPath
    })
  }
})

router.afterEach((to) =>{
  NProgress.done()
  window.scrollTo(0, 0);
});

export const routeConfig = router;
