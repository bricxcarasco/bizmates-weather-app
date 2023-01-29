import { createRouter, createWebHistory } from 'vue-router';
import Main from '../pages/Main.vue';

const routes = [
  {
    path: '/',
    name: 'main',
    component: Main
  }
];

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes
});

export default router;
