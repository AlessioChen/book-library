import axios from 'axios';


const http = axios.create();
const db_url = "http://localhost/api/v1";


export default {

  login(creds) {
    return http.post(db_url + '/login', creds)
  },

  logout() {
    return http.get(db_url + '/logout', {
      headers: {
        'Authorization': 'Bearer ' + localStorage.getItem('token')
      }
    });
  },
  register(data) {
    return http.post(db_url + '/register', {
      email: data.email,
      name: data.name,
      password: data.password,
      password_confirm: data.passwordConfirm
    });
  },

  userBooks() {
    return http.get(db_url + `/users/${localStorage.getItem('user_id')}/books`, {
      headers: {
        'Authorization': 'Bearer ' + localStorage.getItem('token')
      }
    });

  },

  deleteUserBook(book_id) {
    return http.delete(db_url + `/users/${localStorage.getItem('user_id')}/books/${book_id}`, {
      headers: {
        'Authorization': 'Bearer ' + localStorage.getItem('token')
      }
    })
  },

  booksNotInLibrary() {
    return http.get(db_url + `/users/${localStorage.getItem('user_id')}/books/notIn`, {
      headers: {
        'Authorization': 'Bearer ' + localStorage.getItem('token')
      }
    });
  },
  addBookToLibrary(data) {

    return http.post(db_url + `/users/${localStorage.getItem('user_id')}/books`, {
      book_id: data.book_id,
      completed_readings: data.completed_readings
    }, {
      headers: {
        'Authorization': 'Bearer ' + localStorage.getItem('token')
      }
    });


  }


}