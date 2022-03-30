import userApi from '../../api/userApi';


const SET_BOOKS = "SET_BOOKS";
const SET_SHOW_BOOK = "SET_SHOW_BOOK";


const state = {
  books: [],
  book: null,
  showBook: false
}

const getters = {
  getUserBooks(state) {
    return state.books;
  },

  getShowBook(state) {
    return state.showBook;
  },
  getBook(state) {
    return state.book;
  }

}
const actions = {
  getAllUserBooks({ commit }) {

    return new Promise((resolve, reject) => {
      userApi.userBooks()
        .then(res => {
          commit(SET_BOOKS, res.data)
        })
    });

  },
  setShowBook({ commit }, { book, value }) {
    commit(SET_SHOW_BOOK, { book, value });
  },
  deleteBook({ commit }, book_id) {
    return new Promise((resolve, reject) => {
      userApi.deleteUserBook(book_id)
        .then(res => {
          console.log(res);
        });
    });
  },
  addBook({ commit }, { book_id, completed_readings }) {
    return new Promise((resolve, reject) => {
      setTimeout(() => {
        userApi.addBookToLibrary({ book_id, completed_readings })
          .then(res => {
            resolve();
          }).catch(err => {
            reject();
          })
      }, 100);

    })
  }
}

const mutations = {

  [SET_BOOKS](state, books) {
    state.books = books;
  },
  [SET_SHOW_BOOK](state, { book, value }) {
    state.book = book;
    state.showBook = value;
  }

}

export default {
  namespaced: true,
  state,
  getters,
  actions,
  mutations
}