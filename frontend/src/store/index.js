import { createStore } from "vuex";
import createPersistedState from "vuex-persistedstate";
import auth from './modules/auth';
import userBooks from './modules/userBooks'; 


export default createStore({
  modules: {
    auth,
    userBooks
  },
  plugins: [createPersistedState()]
}); 

