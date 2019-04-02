import Vue from 'vue';
import Router from 'vue-router';

import StartScreen from './components/StartScreen';


Vue.use(Router);

const routes = [
  {
    path: '/',
    name: 'start',
    component: StartScreen
  },
  // {
  //   path: '/finale',
  //   name: 'questions',
  //   component: Questions
  // },
  {
    path: '*',
    redirect: '/'
  },
];

export default new Router({routes});