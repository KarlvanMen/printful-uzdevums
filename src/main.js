// Importing the main features without whom the basics would collapse and ghosts of the past will hunt us
import Vue from 'vue'
import axios from 'axios'
import VueAxios from 'vue-axios'
import Buefy from 'buefy'
// Importing the rest
import router from './router'
import store from './store'
import App from './App.vue'
import 'es6-promise/auto'
import 'buefy/dist/buefy.css'

Vue.use(VueAxios, axios)
Vue.use(Buefy)

Vue.config.productionTip = false

new Vue({
  router,
  store,
  render: h => h(App),
}).$mount('#app')
