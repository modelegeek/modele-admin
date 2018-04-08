import JwtToken from "../../classes/JwtToken";

const jwtObject = new JwtToken();
const namespaced = true;

const state = {
  token: jwtObject.token,
}

const mutations = {
  update (state, payload){
    state.token = payload.token;
    jwtObject.update(payload.token);
  },
  destroy (state){
    jwtObject.destroy()
  }
}

const actions = {
  update ({ commit }, payload){
    console.log(payload);
    commit('update', payload);
  }
}

const getters = {
  token: state => state.token
}

export default {
  namespaced,
  state,
  actions,
  mutations,
  getters
}
