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

    commit(LOGIN);

    return new Promise((resolve, reject) => {
      setTimeout(() => {
        userApi.login(creds)
          .then(({ data }) => {
            let access_token = data.data.access_token;
            let user = data.data.user;
            localStorage.setItem('token', access_token);
            localStorage.setItem('user_id', user.id);
            commit("LOGIN_SUCCESS", { token: access_token, user: user });

            resolve();
          })
          .catch(err => {
            commit("AUTH_ERROR");
            localStorage.removeItem("token");
            localStorage.removeItem("user_id");
            reject();

          })
      }, 100);
    });

  },

  logout: ({ commit }) => {

    return new Promise((resolve, reject) => {
      userApi.logout()
        .then((response) => {
          commit(LOGOUT);
          localStorage.removeItem("token");
          localStorage.removeItem("user_id");
          resolve();
        }).catch(err => {
          commit(LOGOUT);
          localStorage.removeItem("token");
          localStorage.removeItem("user_id");

        })
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
    state.user = data.user;

  },
  [AUTH_ERROR](state) {
    state.status = "error";
    state.token = "";
    state.user = null;
  },
  [LOGOUT](state) {
    state.status = "";
    state.token = "";
    state.user = null;
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

