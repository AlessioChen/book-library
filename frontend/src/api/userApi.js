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

  userBooks() {
    return http.get(db_url + `/users/${localStorage.getItem('user_id')}/books`, {
      headers: {
        'Authorization': 'Bearer ' + localStorage.getItem('token')
      }
    });

  }
}