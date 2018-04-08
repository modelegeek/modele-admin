const namespaced = true;

const state = {
  token_type    :null,
  access_token  :null,
  refresh_token :null,
  name          :null,
}

const mutations = {
  update(state, payload) {
    state.token_type = payload.token_type;
    state.access_token = payload.access_token;
    state.refresh_token = payload.refresh_token;
    state.name = payload.username;

    localStorage.setItem('authorization', JSON.stringify(payload));
  },

  updateName(state, name) {
    let authentication = localStorage.getItem('authorization');
    let newPayload = {};

    if ( authentication != "null" && authentication != "undefined" && authentication != null && authentication != undefined ) {
      authentication = JSON.parse(authentication)
      newPayload.access_token = authentication.access_token;
      newPayload.refresh_token = authentication.refresh_token;
      newPayload.token_type = authentication.token_type;
      newPayload.username = name;
      state.name = name;
    }

    localStorage.setItem('authorization', JSON.stringify(newPayload));
  },

  init(state) {
    let authentication = localStorage.getItem('authorization');

    if ( authentication != "null" && authentication != "undefined" && authentication != null && authentication != undefined ) {
      authentication = JSON.parse(authentication)
      state.access_token = authentication.access_token;
      state.refresh_token = authentication.refresh_token;
      state.token_type = authentication.token_type;
      state.name = authentication.username;
    }
  },

  destroy(state) {
    state.token_type = null;
    state.access_token = null;
    state.refresh_token = null;
    state.name = null;

    localStorage.setItem('authorization', null);
  }
}

const actions = {
  login({ commit }, payload) {
    commit('update', payload);
  },

  updateName({ commit }, payload) {
    commit('updateName', payload);
  },

  logout({ commit }) {
    commit('destroy');
  }
}

const getters = {
  token :(state) => {
    if ( state.token_type && state.access_token ) {
      return state.token_type + ' ' + state.access_token
    }

    return null;
  },

  headers :(state) => {
    if ( state.token_type && state.access_token ) {
      return { 'Authorization' :state.token_type + ' ' + state.access_token }
    }

    return null;
  },

  isLogin :(state) => {
    if ( state.token_type && state.access_token && state.refresh_token )
      return true;

    return false;
  },

  refresh  :state => state.refresh_token,
  username :state => state.name,
}

export default {
  namespaced,
  state,
  actions,
  mutations,
  getters
}
