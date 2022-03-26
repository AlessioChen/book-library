import userApi from '../../api/userApi';

const LOGIN = "LOGIN";
const LOGIN_SUCCESS = "LOGIN_SUCCESS";
const LOGOUT = "LOGOUT";
const AUTH_ERROR = "AUTH_ERROR";



// initial state
const state = {
  user: null,
  status: "",
  token: localStorage.getItem("token") || "",

}

// getters
const getters = {
  isLoggedIn: state => !!state.token,
  authStatus: state => state.status
}


// actions
const actions = {

  login: ({ commit }, creds) => {

    userApi.login(creds)
      .then(({ data }) => {
        let access_token = data.data.access_token;
        let user = data.data.user;

        localStorage.setItem('access_token', access_token);
        commit("LOGIN_SUCCESS", { token: access_token, user: user });

      })
      .catch(e => {
        commit("AUTH_ERROR");
        localStorage.removeItem('access_token');
      });

  },

}

// mutations
const mutations = {

  [LOGIN](state) {
    state.status = 'pending';
  },

  [LOGIN_SUCCESS](state, data) {
    state.status = "success"
    state.token = data.token;
    state.user = data.use;

  }
};


export default {
  namespaced: true,
  state,
  getters,
  actions,
  mutations
};

// mutations

