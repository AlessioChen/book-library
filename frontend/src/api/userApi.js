import axios from 'axios';


const http = axios.create();
const db_url = "http://localhost/api/v1";


export default {

  login(creds) {
    return http.post(db_url + '/login', creds)
  }
}