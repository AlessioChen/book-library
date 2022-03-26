import { createApp, VueElement } from 'vue';
import store from './store';
import App from './App.vue';
import router from './router';
import axios from 'axios';
import './assets/tailwind.css';


const app = createApp(App);
app.use(router);
app.use(store);
app.mount('#app');