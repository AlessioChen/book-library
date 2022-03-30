import { createRouter, createWebHistory } from 'vue-router';
import Home from '@/views/Home.vue';
import Login from '@/views/Login.vue';
import Books from '@/views/Books.vue';
import { useStore } from "vuex";
import store from "../store/index";

const routes = [
  { path: '/login', name: "Login", component: Login },
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

