import Vue from 'vue'
import Vuex from 'vuex'
import histories from './modules/histories'
import authorize from './modules/authorize'

Vue.use(Vuex);

export default new Vuex.Store({
  modules: {
    authorize,
    histories
  },
})
