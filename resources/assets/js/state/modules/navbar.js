const namespaced = true;

const state = {
  open: true
}

const mutations = {
  toggle (state, payload){
    state.open = state.open == true ? false: true;
  }
}

const actions = {
  toggle ({ commit }){
    commit('toggle');
  }
}

const getters = {
  toggleStatus: state => state.open
}

export default {
  namespaced,
  state,
  actions,
  mutations,
  getters
}
