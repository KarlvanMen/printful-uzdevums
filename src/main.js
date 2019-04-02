import Vue from 'vue'
import axios from 'axios'
import VueAxios from 'vue-axios'
import Buefy from 'buefy'
import 'buefy/dist/buefy.css'

import router from './router'
import store from './store'
import App from './App.vue'
import 'es6-promise/auto'

Vue.use(VueAxios, axios)
Vue.use(Buefy)

Vue.config.productionTip = false

new Vue({
  router,
  store,
  render: h => h(App),
}).$mount('#app')
