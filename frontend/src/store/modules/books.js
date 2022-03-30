
import userApi from '../../api/userApi';

const SET_BOOKS = "SET_BOOKS";



const state = {
  books: [],

}

const getters = {

  getBooks(state) {
    return state.books;
  },
}
const actions = {

  fetchBooks({ commit }) {
    return new Promise((resolve, reject) => {
      userApi.booksNotInLibrary()
        .then(res => {
          commit(SET_BOOKS, res.data);
        })
    })
  }
}

const mutations = {
  [SET_BOOKS](state, books) {
    state.books = books;
  },
}

export default {
  namespaced: true,
  state,
  getters,
  actions,
  mutations
}