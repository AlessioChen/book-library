import { createRouter, createWebHistory } from 'vue-router';
import Home from '@/views/Home.vue';
import Login from '@/views/Login.vue';
import Books from '@/views/Books.vue';
import Register from '@/views/Register.vue'
import store from "../store/index";

const routes = [
  { path: '/login', name: "Login", component: Login },
  { path: '/register', name: "Register", component: Register },
  { path: '/', name: 'Home', component: Home, meta: { requiredAuth: true } },
  { path: '/books', name: 'books', component: Books, meta: { requiredAuth: true } }

];

const router = createRouter({
  history: createWebHistory(),
  routes
});

router.beforeEach((to, from, next) => {
  if (to.matched.some(record => record.meta.requiredAuth)) {
    if (store.getters['auth/isLoggedIn']) {
      next();
      return;
    }
    next("/login");
  } else {
    next();
  }
})
export default router

