import Histories from "../../classes/Histories";

const historiesObject = new Histories();
const namespaced = true;

const state = {
  histories: historiesObject.histories
}

const mutations = {
  add (state, payload){
    historiesObject.pushHistory(payload.name, payload.path)
  }
}

const getters = {
  list: state => state.histories
}

const actions = {
  add ({ commit }, payload){
    commit('add', payload);
  }
}

export default {
  namespaced,
  state,
  actions,
  getters,
  mutations
}
