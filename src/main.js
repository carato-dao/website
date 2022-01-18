import Vue from 'vue'
import App from './App.vue'
import router from './router'
import VueClipboard from 'vue-clipboard2'
import VuePageTransition from 'vue-page-transition'
import Embed from 'v-video-embed'

Vue.use(VueClipboard)
Vue.use(VuePageTransition)
Vue.use(Embed);


Vue.config.productionTip = false

new Vue({
  router,
  render: h => h(App)
}).$mount('#app')
