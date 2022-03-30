import { createStore } from "vuex";
import createPersistedState from "vuex-persistedstate";
import auth from './modules/auth';
import userBooks from './modules/userBooks'; 
import books from './modules/books'; 


export default createStore({
  modules: {
    auth,
    books, 
    userBooks
  },
  plugins: [createPersistedState()]
}); 

